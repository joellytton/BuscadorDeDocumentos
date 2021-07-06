<?php

namespace App\Models;

use App\Models\User;
use App\Models\Emitente;
use App\Models\TipoDocumento;
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
        'descricao',
        'data_criacao',
        'data_atualizacao',
        'id_usuario',
        'id_emitente',
        'id_tipo_documento',
        'status',
    ];


    public function emitente()
    {
        return $this->belongsTo(Emitente::class, 'id_emitente');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
