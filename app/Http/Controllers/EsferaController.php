<?php

namespace App\Http\Controllers;

use App\Models\Esfera;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EsferaController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:1');
    }

    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $esferas = Esfera::buscar($perPage, $keyword);
        return view('esfera.index', compact('esferas'));
    }

    public function create(): View
    {
        return view('esfera.create');
    }

    public function store(Request $request): Response
    {
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $esfera = Esfera::create($requestData);

        if (!$esfera) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.esfera.index')
                ->with('error', "Falha ao cadastrar uma esfera.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.esfera.index')
            ->with('success', "Esfera cadastrada com sucesso.");
    }

    public function edit(int $id): View
    {
        $esfera = Esfera::findOrFail($id);
        return view('esfera.edit', compact('esfera'));
    }

    public function update(Request $request, $id): Response
    {
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $esfera = Esfera::findOrFail($id);

        if (!$esfera->update($requestData)) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.esfera.index')
                ->with('error', "Falha ao alterada uma esfera.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.esfera.index')
            ->with('success', "Esfera alterada com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $esfera = Esfera::findOrFail($id);

        DB::beginTransaction();

        if (!$esfera->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.esfera.index')
                ->with('error', "Falha ao deletar uma esfera.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.esfera.index')
            ->with('success', "Esfera deletada com sucesso.");
    }
}
