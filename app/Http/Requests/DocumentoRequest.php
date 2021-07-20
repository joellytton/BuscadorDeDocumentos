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
            'doe' => ['required'],
            'data' => ['required'],
            'id_tipo_documento' => ['required'],
            'numero' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'id_esfera.required' => 'O campo esfera é obrigatório.',
            'id_tipo_documento' => 'O campo esfera é obrigatório.',
            'numero.required' => 'O campo tipo é obrigatório.',
            'numero.max' => 'O campo número não pode ser maior que 255 caracteres.',
        ];
    }
}
