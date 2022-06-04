<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de Posiciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2>Tabla de Posiciones</h2>
        <hr>

        <table class="table table-bordered table-sm">
            <thead class="bg-success">
                <tr class="text-center text-light">
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Puntos</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PE</th>
                    <th>PP</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DIF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tablaPosiciones as $pos=>$equipo)
                    <tr>
                        <td>{{$pos+1}}</td>
                        <td>{{$equipo['nombre']}}</td>
                        <td class="text-center">{{$equipo['PTS']}}</td>
                        <td class="text-center">{{$equipo['PJ']}}</td>
                        <td class="text-center">{{$equipo['PG']}}</td>
                        <td class="text-center">{{$equipo['PE']}}</td>
                        <td class="text-center">{{$equipo['PP']}}</td>
                        <td class="text-center">{{$equipo['GF']}}</td>
                        <td class="text-center">{{$equipo['GC']}}</td>
                        <td class="text-center">{{$equipo['DIF']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>