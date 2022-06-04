<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidosRequest extends FormRequest
{
    const DIA_MAX = '2022-12-31';
    const HORA_MIN = '09:00';
    const HORA_MAX = '21:00';
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
            'dia' => 'required|date_format:Y-m-d|after_or_equal:today|before_or_equal:'.self::DIA_MAX,
            'hora' => 'required|date_format:H:i|after_or_equal:'.self::HORA_MIN.'|before_or_equal:'.self::HORA_MAX,
            'fecha' => 'required|numeric|gte:1|exists:fechas,id',
            'estadio' => 'required|exists:estadios,codigo',
            'local' => 'required|numeric|gte:1|exists:equipos,id',
            'visita' => 'required|numeric|gte:1|exists:equipos,id|different:local'
        ];
    }

    public function messages(){
        return [
            'dia.required' => 'Indique el día del partido',
            'dia.date_format' => 'Día del partido no válida',
            'dia.after_or_equal' => 'Los partidos deben realizarse desde hoy en adelante',
            'dia.before_or_equal' => 'Los partidos deben realizarse este año',
            'hora.required' => 'Indique hora del partido',
            'hora.date_format' => 'Hora del partido no válida',
            'hora.after_or_equal' => 'Los partidos se programan a partir de las '.self::HORA_MIN.' hrs',
            'hora.before_or_equal' => 'Los partidos deben terminar como máximo a las '.self::HORA_MAX. ' hrs',
            'fecha.required' => 'Indique la fecha del campeonato',
            'fecha.numeric' => 'Fecha de campeonato no válida',
            'fecha.gte' => 'Fecha de campeonato no válida',
            'fecha.exists' => 'Fecha de campeonato no válida',
            'estadio.required' => 'Indique estadio para el partido',
            'estadio.exists' => 'Estadio no válido',
            'local.required' => 'Indique equipo local',
            'local.numeric' => 'Equipo local no válido',
            'local.gte' => 'Equipo local no válido',
            'local.exists' => 'Equipo local no válido',
            'visita.required' => 'Indique equipo visita',
            'visita.numeric' => 'Equipo visita no válido',
            'visita.gte' => 'Equipo visita no válido',
            'visita.exists' => 'Equipo visita no válido',
            'visita.different' => 'Equipo local y visita no pueden ser el mismo'
        ];
    }
}
