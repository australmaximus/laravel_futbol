<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'equipos';

    // 1 equipo tiene muchos jugadores, en plural
    public function  jugadores(){
        return $this->hasMany('App\Models\Jugador');
    }

    // Relación muchos a muchos
    public function partidos(){
        return $this->belongsToMany('App\Models\Partido')->withPivot(['es_local','cantidad_goles']);
    }

    /*
    * Recibe un objeto partido e indica si el partido ganó, empató o perdió
    */
    private function getResultadoPartido(Partido $partido){
        $goles_equipo = $partido->equipos()->where('equipo_id',$this->id)->first()->pivot->cantidad_goles;
        $goles_rival = $partido->equipos()->where('equipo_id','!=',$this->id)->first()->pivot->cantidad_goles;

        return $goles_equipo>$goles_rival?'G':($goles_equipo==$goles_rival?'E':'P');
    }

    // G , E , P
    private function getPartidos($tipo){
        // $listaPartidosGanados = collect();
        // foreach ($this->partidos as $partido) {
        //     if($this->getResultadoPartido($partido)=='G'){
        //         $listaPartidosGanados.add($partido);
        //     }
        // }

        // otra forma, sirve para partidos, empatados o perdidos
        // se pasa la variable de afuera hacia dentro con "use"
        return $this->partidos->filter(function ($partido) use ($tipo){
            if($this->getResultadoPartido($partido)==$tipo){
                return $partido;
            }
        });
        
    }

    public function getPuntos(){
        return $this->getPG()->count()*3+$this->getPE()->count();
    }

    public function getPG(){
        return $this->getPartidos('G');
    }

    public function getPE(){
        return $this->getPartidos('E');
    }

    public function getPP(){
        return $this->getPartidos('P');
    }

    public function getGF(){
        return $this->partidos->sum('pivot.cantidad_goles');
    }

    public function getGC(){
        $goles_rival = 0;
        // Iterar por cada partido que ha jugado X equipo
        // foreach ($this->partidos as $partido) {
        //     // si estoy mirando ese partido, entra al listado de equipos que lo estan jugando
        //     // y filtra en la tabla pivote por aquellos que el equipo_id no sea el id de este equipo
        //     $goles_rival += $partido->equipos()->wherePivot('equipo_id','!=',$this->id)->first()->pivot->cantidad_goles;
        // }

        // otra forma, pasarlo por referencia, como un puntero, no como copia
        $this->partidos->each(function($partido) use(&$goles_rival){
            $goles_rival += $partido->equipos()->wherePivot('equipo_id','!=',$this->id)->first()->pivot->cantidad_goles;
        });

        return $goles_rival;
    }



}
