<?php

namespace App\Http\Controllers;

use App\Models\Mskdata; // Pastikan ini ada
use Illuminate\Http\Request;

class MskdataController extends Controller
{
    public function destroy($id_mskdata)
    {
        // Cari data berdasarkan id_mskdata
        $data = Mskdata::findOrFail($id_mskdata);
    
        if ($data) {
            $data->delete(); // Hapus data menggunakan model
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }
    // Menampilkan semua data
    public function index()
    {
        $users = Mskdata::all(); // Ambil semua data
        return view('flora', compact('users')); // Ganti 'flora' dengan nama view Anda
    }

    // Menampilkan form untuk menambah data
    public function create()
    {
        return view('create'); // Ganti dengan nama view yang sesuai untuk membuat data
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'situs_kegiatan' => 'required|string|max:255',
            'tempat_kegiatan' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dana_keluar' => 'required|numeric',
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Upload file proposal jika ada
        if ($request->hasFile('proposal')) {
            $fileName = time() . '_' . $request->file('proposal')->getClientOriginalName();
            $request->file('proposal')->storeAs('proposals', $fileName, 'public');
        }

        // Menyimpan data ke tabel mskdata
        Mskdata::create([
            'kegiatan' => $request->kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'situs_kegiatan' => $request->situs_kegiatan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'keterangan' => $request->keterangan,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'dana_keluar' => $request->dana_keluar,
            'proposal' => isset($fileName) ? $fileName : null,
        ]);

        return redirect()->route('mskdata.index')->with('success', 'Data berhasil disimpan!');
    }

    // Menampilkan form untuk edit data
    public function edit($id)
    {
        $data = Mskdata::findOrFail($id);
        return view('edit', compact('data')); // Ganti 'edit' dengan nama view edit Anda
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $data = Mskdata::findOrFail($id);
        
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'situs_kegiatan' => 'required|string|max:255',
            'tempat_kegiatan' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dana_keluar' => 'required|numeric',
            // Jika proposal bisa diupload, tambahkan juga validasi ini
            // 'proposal' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update data
        $data->update($request->all());

        return redirect()->route('mskdata.index')->with('success', 'Data berhasil diupdate');
    }

    // Menghapus data
    
}
