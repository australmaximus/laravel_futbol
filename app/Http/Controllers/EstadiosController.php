<?php

namespace App\Http\Controllers;

use App\Models\Estadio;
use Illuminate\Http\Request;
use App\Http\Requests\EstadiosRequest;
use Illuminate\Support\Facades\Storage;

class EstadiosController extends Controller
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
        $estadios = Estadio::all();
        return view('estadios.index',compact('estadios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadiosRequest $request)
    {
        $estadio = new Estadio();
        $estadio->codigo = $request->codigo;
        $estadio->nombre = $request->nombre;
        $estadio->ciudad = $request->ciudad;
        $estadio->imagen = $request->imagen->store('public/estadios');
        $estadio->save();
        
        return redirect()->route('estadios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function show(Estadio $estadio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadio $estadio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadio $estadio)
    {
        $estadio->nombre = $request->nombre;
        $estadio->ciudad = $request->ciudad;
        if(isset($request->imagen)){
            // borrar la imagen actual
            Storage::delete($estadio->imagen);
            // subir nueva imagen
            $estadio->imagen = $request->imagen->store('public/estadios');
        }
        $estadio->save();

        return redirect()->route('estadios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadio $estadio)
    {
        $estadio->delete();
        return redirect()->route('estadios.index');
    }
}
