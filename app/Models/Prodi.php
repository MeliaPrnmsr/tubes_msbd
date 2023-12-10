<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis'; // Nama tabel di database
    protected $primaryKey = 'id_prodi'; // Nama kolom kunci utama

    public $timestamps = false;
}
