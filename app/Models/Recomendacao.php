<?php

namespace App\Models;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Models\RecomendacaoLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recomendacao extends Model
{
    use HasFactory;

    protected $table = 'recomendacao';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    protected $fillable = [
        'achado',
        'recomendacao',
        'base_legal',
        'id_usuario',
        'data_criacao',
        'data_atualizacao',
        'status',
    ];

    public static function buscarRecomendacao(Request $request): AbstractPaginator
    {
        $recomendacao = self::with('usuario', 'categorias')->where('status', 'Ativo');

        $recomendacao->where(function ($q) use ($request) {
            $q->orWhere('achado', 'LIKE', "%$request->search%")
                ->orWhere('recomendacao', 'LIKE', "%$request->search%")
                ->orWhere('base_legal', 'LIKE', "%$request->search%");
        });

        if (!empty($request->id_categoria)) {
            $recomendacao->whereHas('categorias', function ($q) use ($request) {
                $q->whereIn('categoria.id', $request->id_categoria);
            })->get();
        }

        $grupoUsuarios = DB::table('grupo_usuario')->where('id_usuario', Auth::id())->get();

        $grupoUsuarios = str_split($grupoUsuarios->implode('id_grupo'));

        $recomendacao->whereHas('grupos', function ($q) use ($grupoUsuarios) {
            $q->whereIn('grupo.id', $grupoUsuarios);
        })->get();

        return $recomendacao->orderBy('id', 'desc')->paginate(10);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function links()
    {
        return $this->hasOne(RecomendacaoLink::class, 'recomendacao_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(
            Categoria::class,
            'categoria_recomendacao',
            'id_recomendacao',
            'id_categoria'
        );
    }

    public function grupos()
    {
        return $this->belongsToMany(
            Grupo::class,
            'grupo_recomendacao',
            'id_recomendacao',
            'id_grupo'
        );
    }
}
