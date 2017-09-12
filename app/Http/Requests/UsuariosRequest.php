<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/|max:255',
            'username' => 'required|min:5|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cargo' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'name.required'=>'El campo nombre obligatorio',
        'name.regex'=>'El campo nombre debe contener solo texto',
        'name.max'=>'El campo nombre no debe exceder 255 caracteres',
        'name.min'=>'El campo nombre debe tener al menos 3 letras',
        'email.unique'=>'El correo ya está en uso',
        'username.required'=>'El campo nombre de usuario es obligatorio',
        'username.min'=>'El nombre de usuario debe tener al menos 5 caracteres',
        'username.unique'=>'El nombre de usuario ya está en uso',
        'password.required'=>'El campo contraseña es obligatorio',
        'password.min'=>'El campo contraseña debe tener al menos 6 caracteres',
        'password.confirmed'=>'El campo confirmación de contraseña no coincide',
        ];
    }
}
