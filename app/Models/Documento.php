<?php

namespace App\Models;

use App\Models\User;
use App\Models\Emitente;
use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

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
        'id_esfera',
        'id_instituicao',
        'id_tipo_documento',
        'id_usuario',
        'status',
    ];


    public static function buscarDocumento(int $tipo, int $instituicao, $data, string $busca)
    {
        $documento = self::with('instituicao', 'links', 'tipoDocumento')
            ->where('status', 'Ativo');

        if ($tipo > 0) {
            $documento->where('id_tipo_documento', $tipo);
        }

        if ($instituicao > 0) {
            $documento->where('id_instituicao', $instituicao);
        }

        if (!empty($data)) {
            $documento->where('data', $data);
        }

        $documento->where(function ($q) use ($busca) {
            $q->orWhere('numero', 'LIKE', "%$busca%")
                ->orWhere('doe', 'LIKE', "%$busca%")
                ->orWhere('descricao', 'LIKE', "%$busca%");
        });

        return $documento->paginate(10);
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
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
