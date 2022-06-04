@extends('layouts.master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
    <!-- contenido -->
    <div class="row">
        <div class="col">
            <h3>Fechas</h3>
        </div>
    </div>

    <div class="row">
        <!-- formulario -->
        <div class="col-12 col-lg-4 order-lg-1">
            <div class="card">
                <div class="card-header">Agregar Fecha</div>
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


                    <form method="POST" action="{{route('fechas.store')}}">
                        {{-- Agregar medida de seguridad Cross-site request forgery --}}
                        @csrf
                        <div class="form-group">
                            <label for="numero">Número Fecha:</label>
                            <input type="number" id="numero" name="numero" min="1" class="form-control @error('numero') is-invalid @enderror" value="{{old('numero')}}">
                        </div>
                        <div class="form-group">
                            <label for="inicio">Inicio:</label>
                            <input type="date" id="inicio" name="inicio" class="form-control @error('inicio') is-invalid @enderror" value="{{old('inicio')}}">
                        </div>
                        <div class="form-group">
                            <label for="termino">Termino:</label>
                            <input type="date" id="termino" name="termino" class="form-control @error('termino') is-invalid @enderror" value="{{old('termino')}}">
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

        <!-- formulario -->
        <!-- tabla -->
        <div class="col-12 col-lg-8 mt-1 mt-lg-0">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Fecha</th>
                        <th>Inicio</th>
                        <th>Término</th>
                        <th colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                @foreach ($fechas as $num => $fecha)
                <tr>
                    <td>{{$num+1}}</td>
                    <td>Fecha: {{$fecha->numero}}</td>
                    <td>{{date('d-m-Y',strtotime($fecha->inicio))}}</td>
                    <td>{{date('d-m-Y',strtotime($fecha->termino))}}</td>
                    <td class="text-center" style="width: 1rem">
                        {{-- Borrar --}}
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Fecha">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#fechaBorrarModal{{$fecha->id}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </span>
                        {{-- Borrar --}}
                    </td>
                    <td class="text-center" style="width: 1rem">
                        <span data-toggle="tooltip" data-placement="top" title="Editar Fecha">
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#fechaEditarModal{{ $fecha->id }}">
                                <i class="far fa-edit"></i>
                            </button>
                        </span>
                    </td>
                </tr>
                <!-- Modal Borrar Fecha -->
                <div class="modal fade" id="fechaBorrarModal{{$fecha->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Fecha</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar la fecha {{$fecha->numero}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('fechas.destroy',$fecha->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Fecha</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar Fecha  -->
                    <div class="modal fade" id="fechaEditarModal{{ $fecha->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #563d7c !important;">
                                    <h6 class="modal-title" style="color: #fff; text-align: center;">
                                        Editar Fecha
                                    </h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('fechas.update', $fecha->id) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="modal-body" id="cont_modal">

                                        <div class="form-group">
                                            <label for="inicio">Inicio:</label>
                                            <input type="date" id="inicio" name="inicio" class="form-control" value="{{ $fecha->inicio }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="termino">Termino:</label>
                                            <input type="date" id="termino" name="termino" class="form-control" value="{{ $fecha->termino }}">
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
                    <!-- Modal Editar Fecha  -->
                @endforeach
            </table>
        </div>
        <!-- tabla -->


    </div>
    <!-- contenido -->
@endsection

@section('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
</script>
@endsection
