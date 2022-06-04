@extends('layouts.master')

@section('contenido-principal')
    <h3>Agregar Estadio</h3>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">Agregar Estadio</div>
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

                    <form method="POST" action="{{route('estadios.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Código: </label>
                            <input type="text" id="codigo" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{old('codigo')}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Estadio: </label>
                            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad: </label>
                            <input type="text" id="ciudad" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{old('ciudad')}}">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" id="imagen" name="imagen" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                    <button type="reset" class="btn btn-warning text-white btn-block">Cancelar</button>
                                </div>
                                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                    <button type="submit" class="btn btn-info btn-block">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection