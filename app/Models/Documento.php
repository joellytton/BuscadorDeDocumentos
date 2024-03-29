<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Auth;

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
        $documento = self::join('documento_grupo', 'documento.id', '=', 'documento_grupo.id_documento')
            ->with('esfera', 'instituicao', 'links', 'situacao', 'tipoDocumento')
            ->where('status', 'Ativo');

        $grupoUsuarios = DB::table('grupo_usuario')->where('id_usuario', Auth::id())->get();

        $grupoUsuarios = str_split($grupoUsuarios->implode('id_grupo'));

        $documento->whereHas('grupos', function ($q) use ($grupoUsuarios) {
            $q->whereIn('grupo.id', $grupoUsuarios);
        })->get();


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

    public function grupos()
    {
        return $this->belongsToMany(
            Grupo::class,
            'documento_grupo',
            'id_documento',
            'id_grupo'
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
