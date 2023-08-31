<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:1');
    }

    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $grupos = Grupo::buscar($perPage, $keyword);
        return view('grupo.index', compact('grupos'));
    }

    public function create(): View
    {
        return view('grupo.create');
    }

    public function store(Request $request): Response
    {
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $grupo = Grupo::create($requestData);

        if (!$grupo) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.grupo.index')
                ->with('error', "Falha ao cadastrar uma grupo.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.grupo.index')
            ->with('success', "Grupo cadastrado com sucesso.");
    }

    public function edit(int $id): View
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupo.edit', compact('grupo'));
    }

    public function update(Request $request, $id): Response
    {
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $grupo = Grupo::findOrFail($id);

        if (!$grupo->update($requestData)) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.grupo.index')
                ->with('error', "Falha ao alterada uma grupo.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.grupo.index')
            ->with('success', "Grupo alterado com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $grupo = Grupo::findOrFail($id);

        DB::beginTransaction();

        if (!$grupo->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.grupo.index')
                ->with('error', "Falha ao deletar uma grupo.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.grupo.index')
            ->with('success', "Grupo deletado com sucesso.");
    }
}
