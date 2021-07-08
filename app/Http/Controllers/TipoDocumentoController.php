<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TipoDocumentoController extends Controller
{

    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $tiposDocumentos = TipoDocumento::buscaPorNome($perPage, $keyword);

        return view('tipo_documento.index', compact('tiposDocumentos'));
    }

    public function create(): View
    {
        return view('tipo_documento.create');
    }

    public function store(Request $request): Response
    {
        DB::beginTransaction();

        if (!TipoDocumento::create($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.tipoDocumento.index')
                ->with('error', "Falha ao cadastrar um tipo documento.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.tipoDocumento.index')
            ->with('success', "Tipo documento cadastrado com sucesso.");
    }

    public function edit(int $id): View
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipo_documento.edit', compact('tipoDocumento'));
    }

    public function update(Request $request, int $id): Response
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);
        DB::beginTransaction();

        if (!$tipoDocumento->update($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.tipoDocumento.index')
                ->with('error', "Falha ao alterar um tipo documento.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.tipoDocumento.index')
            ->with('success', "Tipo documento alterado com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        DB::beginTransaction();

        if (!$tipoDocumento->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.tipoDocumento.index')
                ->with('error', "Falha ao alterar um tipo documento.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.tipoDocumento.index')
            ->with('success', "Tipo documento deletado com sucesso.");
    }
}
