<?php

namespace App\Models;

use Illuminate\Http\Request;
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
        $recomendacao = self::with('usuario') ->where('status', 'Ativo');

        $recomendacao->where(function ($q) use ($request) {
            $q->orWhere('achado', 'LIKE', "%$request->pesquisa%")
                ->orWhere('recomendacao', 'LIKE', "%$request->pesquisa%")
                ->orWhere('base_legal', 'LIKE', "%$request->pesquisa%");
        });

        return $recomendacao->orderBy('id', 'desc')->paginate(10);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
