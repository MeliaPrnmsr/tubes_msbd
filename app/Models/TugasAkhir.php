<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tugas_akhirs'; // Nama tabel di database
    protected $primaryKey = 'id_tugasakhir'; // Nama kolom kunci utama

    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'author', 'NIM');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id_kategori', 'kategori_id');
    }

    public function dosenPembimbing()
    {
        return $this->hasMany(Dosenpembimbing::class, 'NIM', 'author');
    }


    public function dokumenfiles()
    {
        return $this->hasOne(DokumenFile::class, 'tugasakhir_id', 'id_tugasakhir');
    }

}
