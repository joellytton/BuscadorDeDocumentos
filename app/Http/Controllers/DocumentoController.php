<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Emitente;
use App\Models\Documento;
use App\Models\DocumentoLink;
use App\Models\Esfera;
use App\Models\Instituicao;
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
        $tiposDocumento = TipoDocumento::where('status', 'Ativo')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->get();
        $documentos = Documento::buscarDocumento(
            empty($request->id_tipo_documento) ? 0 : $request->id_tipo_documento,
            empty($request->id_instituicao) ? 0 : $request->id_instituicao,
            $request->data,
            empty($request->pesquisa) ? '' : $request->pesquisa
        );
        return view('documento.index', compact('tiposDocumento', 'instituicoes', 'documentos'));
    }

    public function create(): View
    {
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->get();
        return view('documento.create', compact('tipoDocumentos', 'instituicoes'));
    }

    public function store(Request $request): Response
    {
        DB::beginTransaction();
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        $documento = Documento::create($requestData);

        if (!$documento || !$documento->links()->create($requestData)) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao cadastrar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento cadastrada com sucesso.");
    }

    public function edit($id): View
    {
        $documentos = Documento::findOrFail($id);
        $categorias = Categoria::where('status', 'Ativo');
        $esferas = Esfera::where('status', 'Ativo')->get();
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->get();

        return view('documento.edit', compact('categorias', 'documentos', 'esferas', 'instituicoes', 'tipoDocumentos'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        $link = DocumentoLink::firstOrCreate(
            ['documento_id' => $id],
            ['documento_id' => $id, 'link' => $request->link]
        );

        if (!($documento->update($requestData)) || !($link->update(['link' => $request->link]))) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao alterar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento alterado com sucesso.");
    }

    public function destroy(int $id)
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        if (!$documento->update(['status' => 'Excluido'])) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao deletar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento deletado com sucesso.");
    }
}
