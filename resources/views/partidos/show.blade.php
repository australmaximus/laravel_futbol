@extends('layouts.master')

@section('contenido-principal')
    <h3>Información Partido</h3>
    <hr>

    <form method="POST" action="{{route('partidos.goles',$partido->id)}}">
        @csrf
        <div class="row">
            <div class="col">
                <ul>
                    <li><b>Fecha: </b>{{$partido->fecha->numero}}</li>
                    <li><b>Estadio: </b>{{$partido->estadio->nombre}}</li>
                </ul>
            </div>
        </div>

        <div class="row">
            {{-- LOCAL --}}
            <div class="col-3 offset-2">
                <div class="card">
                    <div class="card-header">Equipo Local</div>
                    <div class="card-body">
                        <h5>{{$equipo_local->nombre}}</h5>
                        <small><b>Entrenador: </b>{{$equipo_local->entrenador}}</small>
                        <div class="form-group row mt-4 ml-1">
                            <label for="goles_local">Goles</label>
                            <div class="col-4">
                                <input type="number" id="goles_local" name="goles_local" min="0" class="form-control" value="{{$equipo_local->pivot->cantidad_goles}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- VS --}}
            <div class="col-2 d-flex justify-content-center align-items-center">
                <b>VS</b>
            </div>

            {{-- VISITA --}}
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Equipo Visita</div>
                    <div class="card-body">
                        <h5>{{$equipo_visita->nombre}}</h5>
                        <small><b>Entrenador: </b>{{$equipo_visita->entrenador}}</small>
                        <div class="form-group row mt-4 ml-1">
                            <label for="goles_visita">Goles</label>
                            <div class="col-4">
                                <input type="number" id="goles_visita" name="goles_visita" min="0" class="form-control" value="{{$equipo_visita->pivot->cantidad_goles}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-success">Aplicar Cambios</button>
            </div>
        </div>
    </form>
@endsection