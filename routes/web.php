<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MskdataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard.html', function () {
    return view('dashboard');
});

Route::get('/bebas', [Controller::class, 'data'])->name('mskdata.index');

Route::get('/mskdata.html', function () {
    return view('mskdata');
});


Route::resource('mskdata', MskdataController::class);

// Route::delete('/delete-mskdata/{id_mskdata}', 'MskdataController@destroy')->name('mskdata.destroy');
Route::get('/mskdata/edit/{id_mskdata}', [MskdataController::class, 'edit'])->name('mskdata.edit');
Route::put('/mskdata/update/{id_mskdata}', [MskdataController::class, 'update'])->name('mskdata.update');


Route::post('/submit-data', [Controller::class, 'storeData'])->name('store.data');

// Rute login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rute pendaftaran (tambahkan ini)
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Rute logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Rute untuk menampilkan data
Route::get('/mskdata', [MskdataController::class, 'data'])->name('mskdata.data');

// Rute untuk menyimpan data
Route::post('/mskdata', [MskdataController::class, 'storeData'])->name('mskdata.store');

// Rute untuk menampilkan form edit
Route::get('/mskdata/edit/{id_mskdata}', [MskdataController::class, 'edit'])->name('mskdata.edit');

// Rute untuk memperbarui data
Route::put('/mskdata/update/{id_mskdata}', [MskdataController::class, 'update'])->name('mskdata.update');

Route::delete('/mskdata/{id_mskdata}', [MskdataController::class, 'destroy'])->name('mskdata.destroy');

