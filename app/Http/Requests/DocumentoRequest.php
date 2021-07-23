<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_esfera' => ['required'],
            'id_instituicao' => ['required'],
            'data' => ['required'],
            'id_tipo_documento' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'id_esfera.required' => 'A esfera é obrigatório.',
            'id_instituicao.required' => 'O instituição é obrigatório.',
            'data.required' => 'A data é obrigatório.',
            'id_tipo_documento.required' => 'O tipo é obrigatório.',
        ];
    }
}
