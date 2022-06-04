<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Campeonato de Fútbol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    @yield('hojas-estilo')
</head>
<body>
    <div class="container-fluid p-0">
        <!-- info del usuario -->
        <div class="row text-white m-0" style="background-color: #222;">
            <div class="col-8">
                Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
            </div>
            <div class="col-3 text-right d-none d-lg-block">
                <small>Último inicio de sesión: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i:s',strtotime(Auth::user()->ultimo_login))}}</small>
            </div>
            <div class="col-1 text-right d-none d-lg-block">
                <a href="{{route('usuarios.logout')}}" class="text-white">Cerrar Sesión</a>
            </div>
        </div>
        <!-- info del usuario -->
        <!-- Navbar menú de navegacion -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="mr-2">
              <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 50px; width: auto;">
            </div>
            <a class="navbar-brand" href="{{route('home.index')}}">DOW020</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Route::current()->getName()=='home.index') active @endif">
                  <a class="nav-link" href="{{route('home.index')}}">Inicio</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='equipos') active @endif">
                  <a class="nav-link" href="{{route('equipos.index')}}">Equipos</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='estadios') active @endif">
                  <a class="nav-link" href="{{route('estadios.index')}}">Estadios</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Estadísticas
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('estadisticas.descargar-tabla-posiciones')}}">Descargar Tabla de Posiciones</a>
                  </div>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='fechas') active @endif">
                  <a class="nav-link" href="{{route('fechas.index')}}">Fechas</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='jugadores') active @endif">
                  <a class="nav-link" href="{{route('jugadores.index')}}">Jugadores</a>
                </li>
                <li class="nav-item @if(Route::current()->getName()!='home.index' && Request::segments()[0]=='partidos') active @endif">
                  <a class="nav-link" href="{{route('partidos.index')}}">Partidos</a>
                </li>
                @if (Gate::allows('usuarios-listar'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle @if((Route::current()->getName()!='home.index' && Request::segments()[0]=='usuarios') || (Route::current()->getName()!='home.index' && Request::segments()[0]=='roles')) active @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('roles.index')}}">Roles</a>
                      <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
                  </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link d-lg-none" href="{{route('usuarios.logout')}}">Cerrar sesión</a>
                </li>
              </ul>
              <div class="my-2 my-lg-0 text-white">
                <span>Hecho por Nicolás Astudillo Díaz</span>
              </div>
            </div>
          </nav>
        <!-- Navbar menú de navegacion -->

        <!-- contenido -->
          <div class="p-2 m-2">
              @yield('contenido-principal')
          </div>
        <!-- contenido -->
    </div>
    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>