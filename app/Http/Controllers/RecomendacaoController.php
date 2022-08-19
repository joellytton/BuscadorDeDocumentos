<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Recomendacao;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function create(): View
    {
        return view("recomendacao.create");
    }

    public function store(Request $request): Response
    {
        try {
            DB::beginTransaction();
            Recomendacao::create($request->all());
            DB::commit();
            return redirect()->route('recomendacao.index')->with('success', 'Recomendação cadastrada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('recomendacao.index')->with('error', 'Erro ao cadastrar recomendação!');
        }
    }

    public function edit($id): View
    {
        $recomendacao = Recomendacao::find($id);
        return view('recomendacao.edit', compact('recomendacao'));
    }

    public function update(Request $request, $id):  Response
    {
        try {
            DB::beginTransaction();
            $recomendacao = Recomendacao::findOrFail($id);
            $recomendacao->update($request->all());
            DB::commit();
            return redirect('recomendacao.index')->with('success', "Recomendação alterada com sucesso.");
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('recomendacao.index')->with('error', "Falha ao alterar uma recomendação.");
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $recomendacao = Recomendacao::findOrFail($id);
            $recomendacao->update(['status' => 'Inativo']);
            DB::commit();
            return redirect()->route('recomendacao.index')->with('success', "Recomendacao deletada com sucesso.");
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('recomendacao.index')->with('error', "Falha ao deletar uma recomendacao.");
        }
    }
}
