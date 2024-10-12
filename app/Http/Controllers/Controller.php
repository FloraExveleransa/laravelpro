<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB; // Pastikan ini ada untuk menggunakan DB facade
use Illuminate\Http\Request; // Import Request jika dibutuhkan
use App\Models\Mskdata; // Import model Mskdata


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   // Menampilkan semua data
   public function data()
   {
       $users = Mskdata::all(); // Mengambil semua data dari tabel
       return view('flora', ['users' => $users]);
   }

   // Menyimpan data
   public function storeData(Request $request)
   {
    

       // Upload file proposal jika ada
       if ($request->hasFile('proposal')) {
           $fileName = time() . '_' . $request->file('proposal')->getClientOriginalName();
           $filePath = $request->file('proposal')->storeAs('proposals', $fileName, 'public');
       }

       // Insert data ke tabel mskdata
       Mskdata::create([
           'kegiatan' => $request->input('kegiatan'),
           'tanggal_kegiatan' => $request->input('tanggal_kegiatan'),
           'situs_kegiatan' => $request->input('situs_kegiatan'),
           'tempat_kegiatan' => $request->input('tempat_kegiatan'),
           'penyelenggara' => $request->input('penyelenggara'),
           'keterangan' => $request->input('keterangan'),
           'jam_mulai' => $request->input('jam_mulai'),
           'jam_selesai' => $request->input('jam_selesai'),
           'dana_keluar' => $request->input('dana_keluar'),
           'proposal' => isset($fileName) ? $fileName : null,
       ]);

       return redirect()->back()->with('success', 'Data berhasil disimpan!');
   }

   // Menghapus data
   public function destroy($id_mskdata)
   {
       $data = Mskdata::findOrFail($id_mskdata);

       if ($data) {
           $data->delete(); // Menghapus data menggunakan model
           return redirect()->back()->with('success', 'Data berhasil dihapus!');
       }

       return redirect()->back()->with('error', 'Data tidak ditemukan!');
   }

   // Menampilkan detail untuk edit
   public function edit($id_mskdata)
   {
       $data = Mskdata::findOrFail($id_mskdata); 
       return view('edit', ['data' => $data]); // Pastikan view edit ada
   }

   // Mengupdate data
   public function update(Request $request, $id_mskdata)
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
           'proposal' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Proposal bisa diupdate ini paca :v
       ]);

       $data = Mskdata::findOrFail($id_mskdata);

       // Upload file proposal jika ada
       if ($request->hasFile('proposal')) {
           $fileName = time() . '_' . $request->file('proposal')->getClientOriginalName();
           $filePath = $request->file('proposal')->storeAs('proposals', $fileName, 'public');
           $data->proposal = $fileName; // Update proposal jika diupload
       }

       // Update data
       $data->update($request->except('proposal')); // Update data tanpa proposal jika tidak ada
       $data->save(); // Simpan perubahan

       return redirect()->back()->with('success', 'Data berhasil diperbarui!');
   }
}