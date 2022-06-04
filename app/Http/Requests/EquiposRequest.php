<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquiposRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:30|unique:equipos,nombre',
            'entrenador' => 'required|min:2|max:30'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del equipo',
            'nombre.min' => 'El nombre del equipo debe tener como mínimo 3 letras',
            'nombre.max' => 'El nombre del equipo no puede tener más de 30 letras',
            'nombre.unique' => 'Ya existe un equipo llamado :input',
            'entrenador.required' => 'Indique el nombre del entrenador',
            'entrenador.min' => 'El entrandor debe tener como mínimo 2 letras',
            'entrenador.max' => 'El entrenador debe tener como máximo 30 letras'
        ];
    }
}
