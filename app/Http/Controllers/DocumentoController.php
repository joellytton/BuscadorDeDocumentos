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

    public function index(): View
    {
        return view('documento.index');
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

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {
        dd($id);
    }

    public function update(Request $request, $id)
    {
        dd($request, $id);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
