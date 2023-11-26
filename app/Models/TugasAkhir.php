<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;
    protected $table = 'tugas_akhirs'; // Nama tabel di database
    protected $primaryKey = 'id_tugasakhir'; // Nama kolom kunci utama

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'author', 'NIM');
    }
}
