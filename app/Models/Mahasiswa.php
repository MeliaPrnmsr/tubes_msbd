<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public $timestamps = false;
=======
>>>>>>> 9c6d6af5417b7eb70622a3950c9b6ac96761ab8c
    
    protected $table = 'mahasiswas'; // Nama tabel di database
    protected $primaryKey = 'NIM'; // Nama kolom kunci utama

<<<<<<< HEAD
=======
    public $timestamps = false;

>>>>>>> 9c6d6af5417b7eb70622a3950c9b6ac96761ab8c
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
