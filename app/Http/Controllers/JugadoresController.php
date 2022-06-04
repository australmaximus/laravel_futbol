<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\JugadoresRequest;

class JugadoresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        $jugadores = Jugador::all();
        $equipos = Equipo::all();
        return view('jugadores.index',compact('jugadores','equipos'));
    }
    
    public function store(JugadoresRequest $request){
        $jugador = new Jugador();
        $jugador->rut = $request->rut;
        $jugador->apellido = $request->apellido;
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->numero = $request->numero;
        $jugador->equipo_id = $request->equipo;
        $jugador->imagen = $request->imagen->store('public/jugadores'); // copia el archivo y lo guarda en el directorio, id unico
        $jugador->save();

        return redirect()->route('jugadores.index');
    }

    public function edit(Jugador $jugador){
        $equipos = Equipo::orderBy('nombre')->get();
        return view('jugadores.edit',compact('jugador','equipos'));
    }

    public function update(Jugador $jugador, Request $request){
        $jugador->apellido = $request->apellido;
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->numero = $request->numero;
        $jugador->equipo_id = $request->equipo;
        if(isset($request->imagen)){
            // borrar la imagen actual
            Storage::delete($jugador->imagen);
            // subir nueva imagen
            $jugador->imagen = $request->imagen->store('public/jugadores');
        }

        $jugador->save();
        return redirect()->route('jugadores.index');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
