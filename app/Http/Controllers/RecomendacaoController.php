<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Categoria;
use Illuminate\View\View;
use App\Models\GrupoUsuario;
use App\Models\Recomendacao;
use Illuminate\Http\Request;
use App\Models\RecomendacaoLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RecomendacaoRequest;
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
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        return view("recomendacao.index", compact('recomendacoes', 'categorias'));
    }

    public function create(): View
    {
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        $usuarioGrupos = GrupoUsuario::where('id_usuario', Auth::id())->pluck('id_grupo');
        $grupos = Grupo::where('status', 'Ativo')->whereIn('id', $usuarioGrupos->toArray())->get();
        return view("recomendacao.create", compact('categorias', 'grupos'));
    }

    public function store(RecomendacaoRequest $request): Response
    {
        try {
            DB::beginTransaction();
            $recomendacao = Recomendacao::create($request->all());

            if (!empty($request->link)) {
                $recomendacao->links()->create($request->all());
            }

            $recomendacao->categorias()->sync($request->categoria_id);
            $recomendacao->grupos()->sync($request->grupo_id);

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
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        $usuarioGrupos = GrupoUsuario::where('id_usuario', Auth::id())->pluck('id_grupo');
        $grupos = Grupo::where('status', 'Ativo')->whereIn('id', $usuarioGrupos->toArray())->get();
        return view('recomendacao.edit', compact('recomendacao', 'categorias', 'grupos'));
    }

    public function update(RecomendacaoRequest $request, $id): Response
    {
        try {
            DB::beginTransaction();
            $recomendacao = Recomendacao::findOrFail($id);
            $recomendacao->update($request->all());

            if (!empty($request->link)) {
                $link = RecomendacaoLink::firstOrCreate(
                    ['recomendacao_id' => $id],
                    ['recomendacao_id' => $id, 'link' => $request->link]
                );
                $link->update(['link' => $request->link]);
            }

            $recomendacao->categorias()->sync($request->categoria_id);
            $recomendacao->grupos()->sync($request->grupo_id);
           
            DB::commit();
            return redirect()->route('recomendacao.index')->with('success', "Recomendação alterada com sucesso.");
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('recomendacao.index')->with('error', "Falha ao alterar uma recomendação.");
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
