@extends('layouts.master')

@section('contenido-principal')
    <!-- contenido -->
    <div class="row">
        <div class="col">
            <h3>Sistema de Campeonato de Fútbol</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/equipos.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Equipos</h5>
                    <div class="btn-group d-flex">
                        <a href="{{route('equipos.index')}}" class="btn btn-outline-success">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/estadios.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Estadios</h5>
                    <div class="btn-group d-flex">
                        <a href="{{route('estadios.index')}}" class="btn btn-outline-success">Ver</a>
                        <a href="{{route('estadios.create')}}" class="btn btn-outline-success">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/estadisticas.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="{{route('estadisticas.descargar-tabla-posiciones')}}">Descargar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/jugadores.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Jugadores</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="{{route('jugadores.index')}}">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/partidos.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Partidos</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="{{route('partidos.index')}}">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        @if (Gate::allows('usuarios-listar'))
        <div class="col-12 col-md-6 col-lg-4 col-xl-2">
            <div class="card m-2">
                <img src="{{ asset('images/configuración.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Configuración</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="{{route('roles.index')}}">Roles</a>
                      <a class="btn btn-outline-success" href="{{route('usuarios.index')}}">Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- contenido -->
@endsection
