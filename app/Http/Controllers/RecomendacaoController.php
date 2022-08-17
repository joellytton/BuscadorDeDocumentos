<?php

namespace App\Http\Controllers;

use App\Models\Recomendacao;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecomendacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:2', ['except' => [
            'index',
        ]]);
    }
    
    public function index(Request $request): View
    {
        $recomendacoes = Recomendacao::buscarRecomendacao($request);
        return view("recomendacao.index", compact('recomendacoes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
