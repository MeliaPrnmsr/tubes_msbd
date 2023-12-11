<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $primaryKey = 'id_like'; 
    public $timestamps = false;
    protected $fillable = [
        'tugasakhir_id',
        'user_id',
    ];
}
