<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->method() == 'PUT') {
            if (empty($this->senha)) {
                $this->request->remove('senha');
            }

            $this->merge([
                'user_alteracao_id' => auth()->user()->id,
            ]);
        }
    }

    public function rules()
    {

        if ($this->method() == 'PUT') {
            return [
                'nome' => ['required'],
                'login' => ['required'],
                'id_perfil' => ['required'],
                'senha' => ['min:6', 'max:255'],
                'email' => ['required', 'email'],
                'telefone' => ['nullable', 'string'],
            ];
        }

        return [
            'nome' => ['required'],
            'login' => ['required'],
            'id_perfil' => ['required'],
            'senha' => ['sometimes', 'required', 'min:6', 'max:255'],
            'email' => ['required', 'email'],
            'telefone' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'login.required' => 'O login é obrigatório.',
            'id_perfil.required' => 'O perfil é obrigatória.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'senha.max' => 'A senha deve ter no máximo 255 caracteres.',
            'data_expirar.required' => 'A data de expiração é obrigatória.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email é inválido.',
            'telefone.string' => 'O telefone é inválido.'
        ];
    }
}
