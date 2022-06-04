<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Http\Requests\EquiposRequest;

class EquiposController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $equipos = Equipo::all();
        return view('equipos.index',compact('equipos'));
    }

    public function store(EquiposRequest $request){
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();
        return redirect()->route('equipos.index');
    }

    public function show(Equipo $equipo){
        return view('equipos.show',compact('equipo'));
    }

    public function destroy(Equipo $equipo){
        $equipo->delete();
        return redirect()->route('equipos.index');
    }

    public function update(Request $request, Equipo $equipo)
    {
        $equipo->nombre = $request->nombre;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();
        return redirect()->route('equipos.index');
    }
}
