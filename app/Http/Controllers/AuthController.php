<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }


// Menampilkan halaman pendaftaran
public function showRegistrationForm()
{
    return view('register'); // Buat view register.blade.php
}

// Proses pendaftaran
public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Buat pengguna baru
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Setelah pendaftaran, redirect ke halaman login dengan pesan sukses
    return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
}

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('/dashboard'); // Ganti dengan route yang diinginkan
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}

