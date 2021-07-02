<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    protected $fillable = [
        'numero',
        'doe',
        'data',
        'data_criacao',
        'data_atualizacao',
        'id_usuario',
        'id_emitente',
        'id_tipo_documento',
        'status',
    ];
}
