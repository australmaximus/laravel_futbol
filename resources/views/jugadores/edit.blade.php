@extends('layouts.master')

@section('contenido-principal')
    <h3>Editar Jugador de: {{$jugador->equipo!=null?$jugador->equipo->nombre:'Sin Equipo'}}</h3>
    <hr>

    <div class="row">
        <!--datos jugador-->
        <div class="col-12 col-md-2 col-lg-2">
            <div class="card">
                <div class="card-header">Jugador</div>
                <img src="{{Storage::url($jugador->imagen)}}" alt="{{$jugador->nombre}} {{$jugador->apellido}}" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nombre: </b>{{$jugador->nombre}} {{$jugador->apellido}}</li>
                    <li class="list-group-item"><b>Posición: </b>{{$jugador->posicion}}</li>
                    <li class="list-group-item"><b>Número: </b>{{$jugador->numero}}</li>
                </ul>
            </div>
        </div>

        <!--datos jugador-->

        <!--formulario edicion-->
        <div class="col-12 col-md-6 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">Formulario de edición</div>
                <div class="card-body">
                    <form method="POST" action="{{route('jugadores.update',$jugador->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" value="{{$jugador->apellido}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$jugador->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="posicion">Posición</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-arquero" value="Arquero" @if($jugador->posicion=='Arquero') checked @endif>
                                    <label for="form-check-label" for="pos-arquero">Arquero</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-defensa" value="Defensa" @if($jugador->posicion=='Defensa') checked @endif>
                                    <label for="form-check-label" for="pos-defensa">Defensa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-volante" value="Volante" @if($jugador->posicion=='Volante') checked @endif>
                                    <label for="form-check-label" for="pos-volante">Volante</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-delantero" value="Delantero" @if($jugador->posicion=='Delantero') checked @endif>
                                    <label for="form-check-label" for="pos-delantero">Delantero</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número Camiseta:</label>
                                <input type="number" class="form-control" min="1" max="99" name="numero" id="numero" value="{{$jugador->numero}}">
                            </div>
                            <div class="form-group">
                                <label for="equipo">Equipo</label>
                                <select class="form-control" id="equipo" name="equipo">
                                    @foreach ($equipos as $equipo)
                                        <option value="{{$equipo->id}}" @if($jugador->equipo_id==$equipo->id) selected="selected" @endif>{{$equipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" id="imagen" name="imagen" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                    <button type="reset" class="btn btn-warning text-white btn-block">Cancelar</button>
                                </div>
                                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                    <button type="submit" class="btn btn-info btn-block">Editar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!--formulario edicion-->
    </div>

    <div class="row">
        <div class="col">
            <a href="{{route('jugadores.index')}}" class="btn btn-info">Volver a Jugadores</a>
        </div>
    </div>
    
@endsection