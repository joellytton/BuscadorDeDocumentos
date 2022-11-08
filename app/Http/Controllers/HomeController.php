<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Documento;
use App\Models\Recomendacao;

class HomeController extends Controller
{
    public function index()
    {
        $quantidadeUsuariosAtivoDoSistema = User::where('status', 1)->get()->count();
        $quantidadeDeDocumentos = Documento::where('status', 1)->get()->count();
        $quantidadeDeRecomendacoes = Recomendacao::where('status', 1)->get()->count();
        $nomeCategorias = Documento::join('categoria_documento', 'categoria_documento.id_documento', 'documento.id')
            ->join('categoria', 'categoria.id', '=', 'categoria_documento.id_categoria')
            ->where('documento.status', 1)
            ->select(DB::raw("COUNT(*) as count"), 'categoria.nome')
            ->groupBy('categoria.nome')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->pluck('nome');

        $nomeCategorias = $nomeCategorias->map(function ($item, $key) {
            return mb_strimwidth($item, 0, 30, "...");
        });

        // dd($nomeCategorias);

        $quantidadeDeDocumentoPorCategoria = Documento::join(
            'categoria_documento',
            'categoria_documento.id_documento',
            '=',
            'documento.id'
        )
            ->join('categoria', 'categoria.id', '=', 'categoria_documento.id_categoria')
            ->where('documento.status', 1)
            ->select(DB::raw("COUNT(*) as count"), 'categoria.nome')
            ->groupBy('categoria.nome')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->pluck('count');


        return view('dashboard', compact(
            'quantidadeUsuariosAtivoDoSistema',
            'quantidadeDeDocumentos',
            'quantidadeDeRecomendacoes',
            'nomeCategorias',
            'quantidadeDeDocumentoPorCategoria'
        ));
    }
}
