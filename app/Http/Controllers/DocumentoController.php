<?php

namespace App\Http\Controllers;

use App\Models\Emitente;
use App\Models\Documento;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DocumentoController extends Controller
{

    public function index(Request $request): View
    {
        $keyword = $request->get('search');
        $perPage = 10;

        $documentos = Documento::with(['emitente', 'tipoDocumento', 'usuario'])->where('status', 'Ativo')
            ->latest()
            ->paginate($perPage);

        if (!empty($keyword)) {
            $documentos = Documento::where('numero', 'LIKE', "%$keyword%")
                ->orWhere('descricao', 'LIKE', "%$keyword%")
                ->orWhere('doe', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        }
        return view('documento.index', compact('documentos'));
    }

    public function create(): View
    {
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->get();
        $emitentes = Emitente::where('status', 'Ativo')->get();
        return view('documento.create', compact('tipoDocumentos', 'emitentes'));
    }

    public function store(Request $request): Response
    {
        DB::beginTransaction();
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();
        if (!Documento::create($requestData)) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao cadastrar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento cadastrada com sucesso.");
    }

    public function edit($id): View
    {
        $documentos = Documento::findOrFail($id);
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->get();
        $emitentes = Emitente::where('status', 'Ativo')->get();
        return view('documento.edit', compact('documentos', 'tipoDocumentos', 'emitentes'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        if (!$documento->update($requestData)) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao alterar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento alterado com sucesso.");
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        if (!$documento->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao deletar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento deletado com sucesso.");
    }
}
