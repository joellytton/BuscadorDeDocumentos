<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use App\Models\Emitente;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;

class MigracaoController extends Controller
{

    public function index()
    {
        $requestData = [];
        
        $teste = Teste::all();

        DB::beginTransaction();

        foreach ($teste as $dados) {
            $tipo = TipoDocumento::where('nome', $dados->tipo)->first();
            $emitente = Emitente::where('nome', $dados->emitente)->first();

            $requestData['numero'] = $dados->numero;
            $requestData['doe'] = $dados->doe;
            $requestData['data'] = $dados->data;
            $requestData['descricao'] = $dados->descrocao;
            $requestData['link'] = $dados->link;
            $requestData['id_usuario'] = 2;
            $requestData['id_emitente'] = $emitente->id;
            $requestData['id_tipo_documento'] = $tipo->id;

            $documento = Documento::create($requestData);

            if (!$documento || !$documento->links()->create($requestData)) {
                DB::rollBack();
                return "Falha ao cadastrar um documento.";
            }
        }

        DB::commit();
        return "deu certo";
    }
}
