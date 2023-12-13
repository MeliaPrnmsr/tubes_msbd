<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    
    protected $table = 'dosens'; 
    protected $primaryKey = 'kode_dosen';

  

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
