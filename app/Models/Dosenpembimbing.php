<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosenpembimbing extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'dosenpembimbings'; // Nama tabel di database
    protected $primaryKey = 'id_dosen_pembimbing'; // Nama kolom kunci utama

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'kode_dosen', 'kode_dosen');
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
}
