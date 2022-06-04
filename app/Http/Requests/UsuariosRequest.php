<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

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
            'nombre' => 'required|min:3|max:30',
            'email' => 'required|email|min:3|max:30|unique:usuarios,email',
            'password' => 'required|min:3|max:40',
            'password2' => 'required|same:password',
            'rol' => 'required|gte:1|exists:roles,id'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del usuario',
            'nombre.min' => 'El nombre del usuario debe tener como mínimo 3 letras',
            'nombre.max' => 'El nombre del usuario no puede tener más de 30 letras',
            'email.required' => 'Indique el email del usuario',
            'email.email' => 'Debe contener estructura de email',
            'email.min' => 'El email debe tener como mínimo 3 letras',
            'email.max' => 'El email debe tener como máximo 30 letras',
            'email.unique' => 'El email no se puede repetir, ya existe uno con :input',
            'password.required' => 'Indique la contraseña para el usuario',
            'password.min' => 'La contraseña debe tener como mínimo 3 carácteres',
            'password.max' => 'La contraseña debe tener como máximo 40 carácteres',
            'password2.required' => 'Debe confirmar su contraseña',
            'password2.same' => 'La contraseña NO es igual a la anterior',
            'rol.required' => 'Indique el rol para el usuario',
            'rol.gte' => 'Rol de usuario no válido',
            'rol.exists' => 'Rol de usuario no válido'
        ];
    }
}
