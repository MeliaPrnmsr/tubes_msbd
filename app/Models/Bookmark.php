<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    protected $primaryKey = 'id_bookmark'; 
    public $timestamps = false;
    protected $fillable = [
        'tanggal',
        'tugasakhir_id',
        'user_id',
    ];
}
