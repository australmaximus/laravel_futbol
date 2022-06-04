<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FechasRequest extends FormRequest
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
            'numero' => 'required|numeric|min:1|max:30',
            'inicio' => 'required|date_format:Y-m-d',
            'termino' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages(){
        return [
            'numero.required' => 'Indique el número de la fecha',
            'numero.numeric' => 'Número de fecha no válido',
            'numero.min' => 'El número de la fecha debe ser como mínimo 1',
            'numero.max' => 'El número de la fecha no puede ser mayor a 99',
            'numero.exists' => 'Número de fecha no válido',
            'inicio.required' => 'Indique la fecha de inicio',
            'inicio.date_format' => 'Fecha de inicio no válida',
            'termino.required' => 'Indique la fecha de inicio',
            'termino.date_format' => 'Fecha de termino no válida',
        ];
    }
}
