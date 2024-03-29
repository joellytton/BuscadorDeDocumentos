<?php

namespace App\Http\Controllers;

use File;
use App\Models\Grupo;
use App\Models\Esfera;
use App\Models\Situacao;
use App\Models\Categoria;
use App\Models\Documento;
use Illuminate\View\View;
use App\Models\Instituicao;
use App\Models\GrupoUsuario;
use Illuminate\Http\Request;
use App\Models\DocumentoLink;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DocumentoRequest;
use Symfony\Component\HttpFoundation\Response;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:2', ['except' => [
            'index',
        ]]);
    }

    public function index(Request $request): View
    {
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        $esferas = Esfera::where('status', 'Ativo')->orderBy('nome')->get();
        $tiposDocumento = TipoDocumento::where('status', 'Ativo')->orderBy('nome')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->orderBy('nome')->get();
        $situacoes = Situacao::where('status', 'Ativo')->orderBy('nome')->get();

        $documentos = Documento::buscarDocumento($request);

        return view('documento.index', compact(
            'categorias',
            'esferas',
            'tiposDocumento',
            'documentos',
            'instituicoes',
            'situacoes'
        ));
    }

    public function create(): View
    {
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        $esferas = Esfera::where('status', 'Ativo')->orderBy('nome')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->orderBy('nome')->get();
        $situacoes = Situacao::where('status', 'Ativo')->orderBy('nome')->get();
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->orderBy('nome')->get();
        $usuarioGrupos = GrupoUsuario::where('id_usuario', Auth::id())->pluck('id_grupo');
        $grupos = Grupo::where('status', 'Ativo')->whereIn('id', $usuarioGrupos->toArray())->orderBy('nome')->get();
        return view('documento.create', compact(
            'categorias',
            'esferas',
            'instituicoes',
            'situacoes',
            'tipoDocumentos',
            'grupos'
        ));
    }

    public function store(DocumentoRequest $request): Response
    {
        DB::beginTransaction();

        $documento = Documento::create($request->all());

        if ($request->upload != null) {
            $filePath = "";
            if ($request->tipo_documento == 'fisico') {
                $fileName = time() . '.' . $request->upload->extension();
                $request->upload->move(public_path('uploads'), $fileName);
                $filePath = "uploads/" . $fileName;
            }
            $request->merge(['link' => $request->tipo_documento == 'fisico' ? $filePath : $request->link]);
        }

        if (!$documento || !$documento->links()->create($request->all())) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao cadastrar um documento.");
        }

        $documento->categorias()->sync($request->categoria_id);
        $documento->grupos()->sync($request->grupo_id);

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento cadastrada com sucesso.");
    }

    public function edit($id): View
    {
        $categorias = Categoria::where('status', 'Ativo')->orderBy('nome')->get();
        $documentos = Documento::findOrFail($id);
        $esferas = Esfera::where('status', 'Ativo')->orderBy('nome')->get();
        $tipoDocumentos = TipoDocumento::where('status', 'Ativo')->orderBy('nome')->get();
        $instituicoes = Instituicao::where('status', 'Ativo')->orderBy('nome')->get();
        $situacoes = Situacao::where('status', 'Ativo')->orderBy('nome')->get();
        $usuarioGrupos = GrupoUsuario::where('id_usuario', Auth::id())->pluck('id_grupo');
        $grupos = Grupo::where('status', 'Ativo')->whereIn('id', $usuarioGrupos->toArray())->orderBy('nome')->get();
        return view('documento.edit', compact(
            'categorias',
            'documentos',
            'esferas',
            'instituicoes',
            'situacoes',
            'tipoDocumentos',
            'grupos'
        ));
    }

    public function update(DocumentoRequest $request, $id): Response
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        $link = DocumentoLink::firstOrCreate(
            ['documento_id' => $id],
            ['documento_id' => $id, 'link' => $request->link]
        );

        $documento->categorias()->sync($request->categoria_id);

        $documento->grupos()->sync($request->grupo_id);

        if (File::exists(public_path($link->link)) && !empty($request->upload)) {
            File::delete(public_path($link->link));
        }

        $filePath = "";
        if ($request->tipo_documento == 'fisico' && !empty($request->upload)) {
            $fileName = time() . '.' . $request->upload->extension();
            $request->upload->move(public_path('uploads'), $fileName);
            $filePath = "uploads/" . $fileName;

            $request->merge(['link' => $request->tipo_documento == 'fisico' ? $filePath : $request->link]);
        }

        if (!($documento->update($request->all())) || !($link->update(['link' => $request->link]))) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao alterar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento alterado com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $documento = Documento::findOrFail($id);
        DB::beginTransaction();

        if (!$documento->update(['id_situacao' => 2, 'status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('documento.index')->with('error', "Falha ao deletar um documento.");
        }

        DB::commit();
        return redirect()->route('documento.index')->with('success', "Documento deletado com sucesso.");
    }
}
