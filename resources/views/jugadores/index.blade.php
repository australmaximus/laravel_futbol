@extends('layouts.master')
@section('hojas-estilo')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection
@section('contenido-principal')
    <!-- contenido -->
    <div class="row">
        <div class="col">
            <h3>Jugadores</h3>
        </div>
    </div>

    <div class="row">
        <!-- formulario -->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">Agregar Jugador</div>
                <div class="card-body">
                    <form method="POST" action="{{route('jugadores.store')}}" enctype="multipart/form-data">
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
                        {{-- Agregar medida de seguridad Cross-site request forgery --}}
                        @csrf
                        <div class="form-group">
                            <label for="rut">RUT:</label>
                            <input type="text" id="rut" name="rut" class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{old('apellido')}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                        </div>
                        <div class="form-group">
                            <label for="posicion">Posición</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-arquero" value="Arquero" checked>
                                    <label for="form-check-label" for="pos-arquero">Arquero</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-defensa" value="Defensa">
                                    <label for="form-check-label" for="pos-defensa">Defensa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-volante" value="Volante">
                                    <label for="form-check-label" for="pos-volante">Volante</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicion" id="pos-delantero" value="Delantero">
                                    <label for="form-check-label" for="pos-delantero">Delantero</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número Camiseta:</label>
                                <input type="number" min="1" max="99" name="numero" id="numero" class="form-control @error('numero') is-invalid @enderror" value="{{old('numero')}}">
                            </div>
                            <div class="form-group">
                                <label for="equipo">Equipo</label>
                                <select class="form-control" id="equipo" name="equipo">
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}"
                                            @if ($equipo->id == old('equipo')) selected="selected" @endif>{{ $equipo->nombre }}
                                        </option>
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
                        <th class="d-lg-none">Jugador</th>
                        <th class="d-none d-lg-table-cell">Apellido</th>
                        <th class="d-none d-lg-table-cell">Nombre</th>
                        <th class="d-none d-lg-table-cell">Posición</th>
                        <th class="d-none d-lg-table-cell">Número</th>
                        <th class="d-none d-lg-table-cell">Equipo</th>
                        <th colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                @foreach ($jugadores as $num => $jugador)
                <tr>
                    <td>{{$num+1}}</td>
                    <td class="d-lg-none">
                        {{$jugador->nombre}} {{$jugador->apellido}} ({{$jugador->numero}})<br>
                        {{$jugador->posicion}}, {{$jugador->equipo!=null?$jugador->equipo->nombre:'Sin Equipo'}}
                    </td>
                    <td class="d-none d-lg-table-cell">{{$jugador->apellido}}</td>
                    <td class="d-none d-lg-table-cell">{{$jugador->nombre}}</td>
                    <td class="d-none d-lg-table-cell">{{$jugador->posicion}}</td>
                    <td class="d-none d-lg-table-cell">{{$jugador->numero}}</td>
                    <td class="d-none d-lg-table-cell">
                        {{-- condicion?valor_si_verdadoer:valor_si_falso --}}
                        {{$jugador->equipo!=null?$jugador->equipo->nombre:'Sin Equipo'}}
                    </td>
                    <td class="text-center" style="width: 1rem">
                        <span data-toggle="tooltip" data-placement="top" title="Borrar Jugador">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#jugadorBorrarModal{{$jugador->id}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </span>
                        
                    </td>
                    <td class="text-center" style="width: 1rem">
                        <a href="{{route('jugadores.edit',$jugador->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top"
                            title="Editar Jugador">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal Borrar Jugador -->
                <div class="modal fade" id="jugadorBorrarModal{{$jugador->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Jugador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                                    ¿Desea borrar al jugador {{$jugador->nombre}} {{$jugador->apellido}}?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('jugadores.destroy',$jugador->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Borrar Jugador</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
