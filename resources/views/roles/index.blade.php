@extends('layouts.master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('contenido-principal')
    <div class="row">
        <div class="col">
            <h3>Roles</h3>
        </div>
    </div>

    <div class="row">
        <!--formulario-->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header cprimary">
                    Agregar Rol
                </div>
                <div class="card-body">
                    <!--errores-->
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <p>Por favor solucione los siguientes problemas:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--/errores-->

                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
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
        <!--/formulario-->

        <!--tabla-->
        <div class="col-12 col-lg-8 mt-1 mt-lg-0">
            <table class="table table-bordered table-striped table-hover">
                <thead class="csecondary">
                    <tr>
                        <th>Nº</th>
                        <th>Nombre</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>

                @foreach ($roles as $num => $rol)
                    <tr>
                        <td class="text-center">{{ $num + 1 }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td class="text-center" style="width:1rem">
                            <!--Borrar-->
                            @if (Auth::user()->id != $rol->id)
                                <span data-toggle="tooltip" data-placement="top" title="Borrar Rol">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#rolBorrarModal{{ $rol->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </span>
                            @endif
                        </td>
                    </tr>

                    <!-- Modal Borrar Rol -->
                    <div class="modal fade" id="rolBorrarModal{{ $rol->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Rol</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                        ¿Desea borrar al rol {{ $rol->nombre }}? <br />Los usuarios que tengan este rol
                                        quedarán catálogados como "Sin Rol Asignado"
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('roles.destroy', $rol->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Borrar Rol</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
        <!--/tabla-->
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
