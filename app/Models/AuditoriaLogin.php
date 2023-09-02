<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaLogin extends Model
{
    protected $table = 'auditoriaLogin';

    protected $fillable = ['id_usuario', 'IP', 'data'];
    
    public $timestamps = false;
}
