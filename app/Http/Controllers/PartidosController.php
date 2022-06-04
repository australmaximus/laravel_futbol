<?php

namespace App\Http\Controllers;

use App\Models\{Partido,Fecha,Estadio,Equipo};
use Illuminate\Http\Request;
use App\Http\Requests\PartidosRequest;

class PartidosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas = Fecha::orderBy('numero')->get();
        $estadios = Estadio::orderBy('nombre')->get();
        $equipos = Equipo::orderBy('nombre')->get();
        $partidos = Partido::orderBy('fecha_id')->orderBy('dia_hora')->get(); // ordenar por fecha, dia y hora
        return view('partidos.index',compact('fechas','estadios','equipos','partidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartidosRequest $request)
    {
        $partido = new Partido();
        $partido->dia_hora = $request->dia.' '.$request->hora; // se concatena con punto
        $partido->estado = 0; // todos los partidos ingresan al sistema como pendiente
        $partido->fecha_id = $request->fecha;
        $partido->estadio_codigo = $request->estadio;
        $partido->save();

        // para este partido se arma el registro en la tabla de intersección (equipo_partido)
        // los atributos que van adicionales a la clave compuesta, se colocan en entre corchetes
        $partido->equipos()->attach($request->local,['es_local'=>true,'cantidad_goles'=>0]);
        $partido->equipos()->attach($request->visita,['es_local'=>false,'cantidad_goles'=>0]);

        return redirect()->route('partidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        // generar instancias del equipo local y del equipo visita para enviarlos listos a la vista
        // filtrar solo por el local de la tabla pivote
        $equipo_local = $partido->equipos()->wherePivot('es_local',true)->get()->first();
        $equipo_visita = $partido->equipos()->wherePivot('es_local',false)->get()->first();
        return view('partidos.show',compact('partido','equipo_local','equipo_visita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function edit(Partido $partido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        // verificar si el partido borrado es el correcto
        // dd($partido->equipoLocal(true)->first()->nombre.' vs '.$partido->equipoLocal(false)->first()->nombre);

        // sacar los datos de la tabla de la intersección
        $partido->equipos()->detach();

        // una vez hecho el detach, ahora se elimina el partido para no romper la integridad referencial
        $partido->delete();

        return redirect()->route('partidos.index');
    }

    public function goles(Partido $partido, Request $request){
        // editar los goles del local y de la visita en la tabla de intersección (equipo_partido)
        $equipo_local = $partido->equipos()->wherePivot('es_local',true)->get()->first();
        $equipo_visita = $partido->equipos()->wherePivot('es_local',false)->get()->first();
        $partido->equipos()->updateExistingPivot($equipo_local->id,['cantidad_goles'=>$request->goles_local]);
        $partido->equipos()->updateExistingPivot($equipo_visita->id,['cantidad_goles'=>$request->goles_visita]);

        // se devuelve a la misma vista con el mismo id de partido
        return redirect()->route('partidos.show',$partido->id);
    }
}
