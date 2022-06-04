<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:30'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del usuario',
            'nombre.min' => 'El nombre del usuario debe tener como mínimo 3 letras',
            'nombre.max' => 'El nombre del usuario no puede tener más de 30 letras'
        ];
    }
}
