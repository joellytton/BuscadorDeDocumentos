<?php

namespace App\Http\Controllers;

use App\Models\Emitente;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EmitenteController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $emitentes = Emitente::buscaPorNome($perPage, $keyword);

        return view('emitente.index', compact('emitentes'));
    }

    public function create(): View
    {
        return view('emitente.create');
    }

    public function store(Request $request): Response
    {
        DB::beginTransaction();

        if (!Emitente::create($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.tipoDocumento.index')
                ->with('error', "Falha ao cadastrar um emitente.");
        }

        DB::commit();

        return redirect()->route('cadastroBasico.tipoDocumento.index')
            ->with('success', "Emitente cadastrado com sucesso.");
    }


    public function edit(int $id): View
    {
        $emitente = Emitente::findOrFail($id);
        return view('emitente.edit', compact('emitente'));
    }

    public function update(Request $request, $id): Response
    {
        $emitente = Emitente::findOrFail($id);
        DB::beginTransaction();

        if (!$emitente->update($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.emitente.index')
                ->with('error', "Falha ao alterar um emitente.");
        }

        DB::commit();
        
        return redirect()->route('cadastroBasico.emitente.index')
            ->with('success', "Emitente alterado com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $emitente = Emitente::findOrFail($id);

        DB::beginTransaction();

        if (!$emitente->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.emitente.index')
                ->with('error', "Falha ao deletar um emitente.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.emitente.index')
            ->with('success', "Emitente deletado com sucesso.");
    }
}
