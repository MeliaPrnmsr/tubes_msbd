<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public $timestamps = false;

    protected $table = 'prodis'; // Nama tabel di database
    protected $primaryKey = 'id_prodi'; // Nama kolom kunci utama
=======
    protected $table = 'prodis'; // Nama tabel di database
    protected $primaryKey = 'id_prodi'; // Nama kolom kunci utama

    public $timestamps = false;

    
>>>>>>> 9c6d6af5417b7eb70622a3950c9b6ac96761ab8c
}
