<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mskdata extends Model
{
    use HasFactory;

    protected $table = 'mskdata';
    protected $primaryKey = 'id_mskdata';

    protected $fillable = [
        'kegiatan',
        'tanggal_kegiatan',
        'situs_kegiatan',
        'tempat_kegiatan',
        'penyelenggara',
        'keterangan',
        'jam_mulai',
        'jam_selesai',
        'dana_keluar',
        'proposal'
    ];

    public $timestamps = true; // Pastikan ini diatur ke true
    const UPDATED_AT = null; // Menonaktifkan updated_at

}
