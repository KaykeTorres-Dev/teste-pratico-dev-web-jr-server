<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response() -> json ([
            'status' => false,
            'errors' => $validator -> errors(),
        ], 422));
    }

    //Recuperar o id do usuário enviado na URL
    public function rules(): array
    {
        $userId = $this -> route('user');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId -> id : null),
            'password' => 'required|min:6',
        ];
    }

    //Retorna as mensagens de erro personalizadas para as regras de validação
    public function messages(): array 
    {
        return [
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo email é obrigatório!',
            'email.email' => 'Necessário enviar e-mail válido!',
            'email.unique' => 'O email já está cadastrado!',
            'password.required' => 'Campo senha é obrigatório!',
            'password.min' => 'A senha tem que ter no mínimo :min carcateres!',
        ];
    }
}
