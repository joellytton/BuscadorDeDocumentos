<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Models\RecomendacaoLink;
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
        $recomendacao = self::with('usuario', 'categorias') ->where('status', 'Ativo');

        $recomendacao->where(function ($q) use ($request) {
            $q->orWhere('achado', 'LIKE', "%$request->search%")
                ->orWhere('recomendacao', 'LIKE', "%$request->search%")
                ->orWhere('base_legal', 'LIKE', "%$request->search%");
        });

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
}
