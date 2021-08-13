<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nome' => ['required'],
            'login' => ['required'],
            'senha' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'login.required' => 'O login é obrigatório.',
            'senha.required' => 'A senha é obrigatória.',
        ];
    }
}
