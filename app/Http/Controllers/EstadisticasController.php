<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use PDF;

class EstadisticasController extends Controller
{
    private function getTabla(){
        $tablaPosiciones = collect();

        foreach (Equipo::all() as $equipo) {
            $tablaPosiciones->add([
                'nombre' => $equipo->nombre,
                'PTS' => $equipo->getPuntos(),
                'PJ' => $equipo->partidos->count(),
                'PG' => $equipo->getPG()->count(),
                'PE' => $equipo->getPE()->count(),
                'PP' => $equipo->getPP()->count(),
                'GF' => $equipo->getGF(),
                'GC' => $equipo->getGC(),
                'DIF' => $equipo->getGF()-$equipo->getGC()

            ]);
        }

        // ordenar de forma descente
        // $tablaPosiciones = $tablaPosiciones->sortByDesc('PTS');

        // Spacechip <=>, mira los 2 elementos

        // $tablaPosiciones = $tablaPosiciones->sort(function($eq1,$eq2){
            //           Si este es mas pequeño que el otro retorna -1, si son iguales retorna 0
            //           Si el primero es mas grande retorna 1
        //      return [$eq2['PTS'],$eq2['DIF']]<=>[$eq1['PTS'],$eq1['DIF']];
        // });

        $tablaPosiciones = $tablaPosiciones->sort(fn($eq1,$eq2) => [$eq2['PTS'],$eq2['DIF']]<=>[$eq1['PTS'],$eq1['DIF']]);
        return $tablaPosiciones->values()->all(); // resetear los indices en la colección
    }

    public function tablaPosiciones(){
        $tablaPosiciones = $this->getTabla();
       
        return view('estadisticas.tabla-posiciones',compact('tablaPosiciones'));
    }

    public function descargarTablaPosiciones(){
        $tablaPosiciones = $this->getTabla();
        $pdf = PDF::loadView('estadisticas.tabla-posiciones',compact('tablaPosiciones'));
        $pdf->setPaper('letter','portrait'); // letter, landscape, portrait
        return $pdf->download('tabla-posiciones.pdf');
    }
}
