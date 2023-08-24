<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    protected $table = 'grupo_usuario';

    protected $fillable = ['id_usuario', 'id_grupo' ];

    public $timestamps = false;
}
