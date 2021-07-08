<?php

namespace App\Models;

use App\Models\User;
use App\Models\Emitente;
use App\Models\TipoDocumento;
use Illuminate\Pagination\AbstractPaginator;
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


    public static function buscarDocumento(int $tipo, int $emitente, $data, string $busca): AbstractPaginator
    {
        $documento = self::with('links')
        ->where('status', 'Ativo');

        if ($tipo > 0) {
            $documento->where('id_tipo_documento', $tipo);
        }

        if ($emitente > 0) {
            $documento->where('id_emitente', $emitente);
        }

        if (!empty($data)) {
            $documento->where('data', $data);
        }

        return $documento->where(function ($q) use ($busca) {
            $q->orWhere('numero', 'LIKE', "%$busca%")
                ->orWhere('doe', 'LIKE', "%$busca%")
                ->orWhere('descricao', 'LIKE', "%$busca%");
        })->paginate(10);
    }

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

    public function links()
    {
        return $this->hasOne(DocumentoLink::class, 'documento_id');
    }
}
