@extends('layouts.master')

@section('contenido-principal')
    <h3>Editar Usuario {{ $usuario->nombre }}</h3>
    <hr>

    <div class="row">
        <!--formulario edicion-->
        <div class="col-12 col-md-6 col-lg-6 mt-3 mx-auto">
            <div class="card">
                <div class="card-header">Formulario de edición</div>
                <div class="card-body">
                    <!-- errores -->
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <p>Por favor solucione los siguientes problemas</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- errores -->
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" value="{{ $usuario->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ $usuario->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="password2">Repetir Contraseña: </label>
                            <input type="password" id="password2" name="password2"
                                class="form-control @error('password2') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="entrenador">Rol:</label>
                            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                                <option value="seleccione">--- Seleccione Rol ---</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-lg-3 offset-lg-5 pr-lg-0">
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
            <a href="{{ route('usuarios.index') }}" class="btn btn-info m-5">Volver a Usuarios</a>
        </div>
    </div>
@endsection
