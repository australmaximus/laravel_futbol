<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadiosRequest extends FormRequest
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
            'codigo' => 'required|min:3|max:4',
            'nombre' => 'required|min:3|max:30',
            'ciudad' => 'required|min:3|max:35',
        ];
    }

    public function messages(){
        return [
            'codigo.required' => 'Indique el código del estadio',
            'codigo.min' => 'El código del estadio debe tener como mínimo 3 carácteres',
            'codigo.max' => 'El código del estadio debe tener como máximo 4 letras',
            'nombre.required' => 'Indique el nombre del estadio',
            'nombre.min' => 'El nombre del estadio debe tener como mínimo 3 letras',
            'nombre.max' => 'El nombre del estadio debe tener como máximo 30 letras',
            'ciudad.required' => 'Indique la ciudad dónde se ubica el estadio',
            'ciudad.min' => 'La ciudad del estadio debe tener como mínimo 3 letras',
            'ciudad.max' => 'La ciudad del estadio debe tener como máximo 35 letras',
        ];
    }
}
