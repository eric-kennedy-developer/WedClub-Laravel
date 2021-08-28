<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users', 'email'],
            'foto_perfil' => ['required', 'unique:users', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo name obrigatório.',
            'name.unique' => 'Campo name já cadastrado.',

            'email.required' => 'Campo email obrigatório.',
            'email.unique' => 'Campo email já cadastrado.',
            'email.email' => 'Campo email precisa ser um email válido.',

            'foto_perfil.required' => 'Campo foto_perfil obrigatório.',
            'foto_perfil.unique' => 'Campo foto_perfil já cadastrado.',
            'foto_perfil.image' => 'Campo foto_perfil precisa ser uma imagem',
            'foto_perfil.mimes' => 'Campo foto_perfil precisa ser uma imagem jpg, jpeg ou png',
            'foto_perfil.max' => 'Campo foto_perfil precisa ter até 2048 KB',

            'password.required' => 'Campo password obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        throw new HttpResponseException(response()->json($validator->errors(), 422, $header, JSON_UNESCAPED_UNICODE));
    }

}
