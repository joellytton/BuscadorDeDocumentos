<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'fisico' => $this->tipo_documento == 'fisico' ? 1 : 0,
            'id_usuario' => Auth::id()
        ]);
    }

    public function rules()
    {
        return [
            'id_esfera' => ['required'],
            'id_instituicao' => ['required'],
            'data' => ['required'],
            'id_tipo_documento' => ['required'],
            'categoria_id' => ['required'],
            'id_situacao' => ['required'],
            'upload' => ['max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'id_esfera.required' => 'A esfera é obrigatório.',
            'id_instituicao.required' => 'O instituição é obrigatório.',
            'data.required' => 'A data é obrigatório.',
            'id_tipo_documento.required' => 'O tipo é obrigatório.',
            'categoria_id.required' => 'A categoria é obrigatório.',
            'id_situacao.required' => 'A situação é obrigatório.',
            'upload.max' => 'O tamanho do arquivo é maior que o permitido (2M).',
        ];
    }
}
