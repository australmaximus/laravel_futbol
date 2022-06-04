@extends('layouts.master')

@section('hojas-estilo')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('contenido-principal')
    <h3>Estadios</h3>
    <hr>
    <div class="row mb-2">
        <div class="col">
            <a href="{{route('estadios.create')}}" class="btn btn-info">Agregar Estadio</a>
        </div>
    </div>

    <div class="row">
        @foreach ($estadios as $estadio)
        <div class="col-12 col-md-4 cold-lg-3 mb-2">
            <div class="card">
                <img src="{{Storage::url($estadio->imagen)}}" alt="{{$estadio->nombre}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$estadio->nombre}}</h5>
                    <p>{{$estadio->ciudad}}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 mb-2 mb-md-0">
                            <a href="" class="btn btn-warning text-white btn-block"  data-toggle="modal"
                            data-target="#estadioEditarModal{{ $estadio->codigo }}">
                                <i class="far fa-edit"></i>
                                Editar
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <a href="" class="btn btn-danger btn-block" data-toggle="modal"
                            data-target="#estadioBorrarModal{{ $estadio->codigo }}">
                                <i class="fas fa-trash-alt"></i>
                                Borrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Borrar Equipo -->
        <div class="modal fade" id="estadioBorrarModal{{$estadio->codigo}}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Estadio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                            ¿Desea borrar al estadio {{$estadio->nombre}}?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{route('estadios.destroy',$estadio->codigo)}}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Borrar Estadio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar Estadio  -->
            <div class="modal fade" id="estadioEditarModal{{ $estadio->codigo }}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #563d7c !important;">
                            <h6 class="modal-title" style="color: #fff; text-align: center;">
                                Editar Estadio
                            </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('estadios.update', $estadio->codigo) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-body" id="cont_modal">
                                <div class="form-group">
                                    <label for="nombre">Nombre Estadio: </label>
                                    <input required type="text" id="nombre" name="nombre" class="form-control" value="{{ $estadio->nombre }}">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad: </label>
                                    <input required type="text" id="ciudad" name="ciudad" class="form-control" value="{{ $estadio->ciudad }}">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <input type="file" id="imagen" name="imagen" class="form-control-file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Modal Editar Equipo  -->
        @endforeach
    </div>
@endsection

@section('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
</script>
@endsection