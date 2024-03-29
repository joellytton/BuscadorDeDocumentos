<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class RecomendacaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id_usuario' => Auth::id()
        ]);
    }

    public function rules()
    {
        return [
            'achado' => ['required'],
            'recomendacao' => ['required'],
            'grupo_id' => ['required'],
            'base_legal' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'achado.required' => 'Os achados são obrigatório.',
            'recomendacao.required' => 'A recomendação é obrigatória.',
            'grupo_id.required' => 'O grupo é obrigatório.',
            'base_legal.required' => 'A base legal é obrigatória.',
        ];
    }
}
