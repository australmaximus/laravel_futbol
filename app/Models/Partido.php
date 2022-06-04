<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partidos';
    public $timestamps = false;

    public function fecha(){ // un partido pertenece a una sola fecha
        return $this->belongsTo('App\Models\Fecha');
    }

    public function estadio(){
        return $this->belongsTo('App\Models\Estadio','estadio_codigo','codigo');
    }

    // Relación muchos a muchos
    public function equipos(){
        return $this->belongsToMany('App\Models\Equipo')->withPivot('cantidad_goles'); // obten los datos de la tabla pivote
    }

    // función para obtener el equipo local correctamente
    public function equipoLocal($local){ // recibe un boolean
        // retorna un solo equipo
        return $this->belongsToMany('App\Models\Equipo')->wherePivot('es_local',$local); // donde en la tabla pivote sea true o false
    }
}
