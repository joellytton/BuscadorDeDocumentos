<?php

namespace App\Models;

use App\Models\User;
use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Http\Request;

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
        'id_situacao',
        'status',
    ];


    public static function buscarDocumento(Request $request): AbstractPaginator
    {
        $documento = self::with('esfera', 'instituicao', 'links', 'situacao', 'tipoDocumento')
            ->where('status', 'Ativo');

        if ($request->id_tipo_documento > 0) {
            $documento->where('id_tipo_documento', $request->id_tipo_documento);
        }

        if ($request->id_instituicao > 0) {
            $documento->where('id_instituicao', $request->id_instituicao);
        }

        if (!empty($request->data)) {
            $documento->where('data', $request->data);
        }

        if (!empty($request->id_esfera)) {
            $documento->where('id_esfera', $request->id_esfera);
        }

        if (!empty($request->id_situacao)) {
            $documento->where('id_situacao', $request->id_situacao);
        }

        if (!empty($request->id_categoria)) {
            $documento->whereHas('categorias', function ($q) use ($request) {
                $q->whereIn('categoria.id', $request->id_categoria);
            })->get();
        }


        if (!empty($request->pesquisa)) {
            $documento->whereRaw("MATCH(descricao) AGAINST('$request->pesquisa')");
            $documento->orWhere('numero', 'LIKE', "%$request->pesquisa%");
            $documento->orWhere('doe', 'LIKE', "%$request->pesquisa%");
        }

        return $documento->orderBy('id', 'desc')->paginate(10);
    }

    public function categorias()
    {
        return $this->belongsToMany(
            Categoria::class,
            'categoria_documento',
            'id_documento',
            'id_categoria'
        );
    }

    public function esfera()
    {
        return $this->belongsTo(Esfera::class, 'id_esfera');
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function links()
    {
        return $this->hasOne(DocumentoLink::class, 'documento_id');
    }

    public function situacao()
    {
        return $this->belongsTo(Situacao::class, 'id_situacao');
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
