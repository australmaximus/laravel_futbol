<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// importando la regla personalizada
use App\Rules\DigitoVerificadorRut;

class JugadoresRequest extends FormRequest
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
            // bail al comienzo para que Laravel revise las reglas en esa secuencia
            // pero si falla una, no continua con las siguientes
            // al momento de llegar a la regla el dígito verificador, el rut cumple con el formato adecuado
            'rut' => ['bail','required','regex:/^(\d{7,8}-[\dkK])$/', new DigitoVerificadorRut], // cuando vaya un regex poner las reglas entre corchetes
            'apellido' => 'required|min:3|max:30',
            'nombre' => 'required|min:3|max:30',
            'numero' => 'required|numeric|min:1|max:99|unique:jugadores,numero'
        ];
    }

    public function messages(){
        return [
            'rut.required' => 'Indique su RUT',
            'rut.regex' => 'Indique RUT sin puntos, con guión y con dígito verificador',
            'apellido.required' => 'Indique el apellido del jugador',
            'apellido.min' => 'El apellido debe contener como mínimo 3 letras',
            'apellido.máximo' => 'El apellido debe contener como maximo 30 letras',
            'nombre.required' => 'Indique el nombre del jugador',
            'nombre.min' => 'El nombre debe contener como mínimo 3 letras',
            'nombre.máximo' => 'El nombre puede contener como maximo 30 letras',
            'numero.required' => 'Indique el numero de camiseta del jugador',
            'numero.numeric' => 'Número de camiseta no válido',
            'numero.min' => 'El número de camiseta debe ser como mínimo 1',
            'numero.max' => 'El número de camiseta debe ser igual o menor a 99',
            'numero.unique' => 'Este número de camiseta ya está registrado'
        ];
    }
}
