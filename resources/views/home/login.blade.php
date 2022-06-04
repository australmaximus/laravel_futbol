<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Campeonato de Fútbol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body style="background-image: url('{{asset('images/background.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid vh-100 d-flex flex-column justify-content-lg-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row bg-light shadow-lg" style="height: 25rem;">
                    <!-- titulo y logo -->
                    <div class="col-12 col-lg-4 bg-primary d-flex flex-column justify-content-center align-items-center text-center pt-3">
                        <div class="p-2 mb-3">
                            <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 200px; width: auto;">
                        </div>
                        <h4 class="text-light">Sistema de Campeonato de Fútbol</h4>
                        <h6 class="text-light">DOW020 - Diseño y Programación Orientada a la Web</h6>
                    </div>

                    <!-- titulo y logo -->

                    <!-- formulario -->
                    <div class="col-lg-8 bg-white d-flex flex-column justify-content-center py-3">
                        <h4>Inicio de Sesión</h4>
                        <small>Proporcione sus credenciales para ingresar al sistema</small>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('usuarios.login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Constraseña</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="text-right">
                                        <div class="row">
                                            <div class="col col-lg-3 offset-lg-9">
                                                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- validacion --}}

                        @if ($errors->any())
                            <div class="alert alert-warning mt-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- validacion --}}
                    </div>

                    <!-- formulario -->
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>