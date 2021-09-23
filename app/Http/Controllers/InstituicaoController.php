<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:1');
    }

    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $instituicoes = Instituicao::buscaPorNome($perPage, $keyword);

        return view('instituicao.index', compact('instituicoes'));
    }

    public function create(): View
    {
        return view('instituicao.create');
    }

    public function store(Request $request): Response
    {
        DB::beginTransaction();

        if (!Instituicao::create($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.instituicao.index')
                ->with('error', "Falha ao cadastrar um emitente.");
        }

        DB::commit();

        return redirect()->route('cadastroBasico.instituicao.index')
            ->with('success', "Instituição cadastrada com sucesso.");
    }


    public function edit(int $id): View
    {
        $instituicao = Instituicao::findOrFail($id);
        return view('instituicao.edit', compact('instituicao'));
    }

    public function update(Request $request, $id): Response
    {
        $instituicao = Instituicao::findOrFail($id);
        DB::beginTransaction();

        if (!$instituicao->update($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.instituicao.index')
                ->with('error', "Falha ao alterar uma instituição.");
        }

        DB::commit();

        return redirect()->route('cadastroBasico.instituicao.index')
            ->with('success', "Instituição alterada com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $instituicao = Instituicao::findOrFail($id);

        DB::beginTransaction();

        if (!$instituicao->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.instituicao.index')
                ->with('error', "Falha ao deletar um emitente.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.instituicao.index')
            ->with('success', "Emitente deletado com sucesso.");
    }
}
