<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('dist/css/bootstrap.min.css') }}
</head>
<body>

<div align="center" style="color: #333;">
<h2 class=""> Listado De Usuarios</h2> <br>
</div>

<div class="container">
    <table class="table table-striped">
        <tbody class="text-capitalize">
    @foreach($users as $user)



            <tr>
                <td><b>Nombre:</b></td>
                <td>{{ $user->nombre }}</td>
                <td><b>Apellido:</b></td>
                <td>{{ $user->apellido }}</td>
                <td><b>Cedula:</b></td>
                <td>{{ $user->identificacion }}</td>
            </tr>
            <tr style="background-color: #f9f9f9;">
                <td><b>Email:</b></td>
                <td>{{ $user->email }}</td>
                <td><b>Celular:</b></td>
                <td>{{ $user->celular }}</td>
                <td><b>Rol:</b></td>
                <td>{{ $user->rol->nombre }}</td>
            </tr>
            <tr>
                <td><b>Barrio:</b></td>
                <td>{{ $user->barrio }}</td>
                <td><b>Direccion:</b></td>
                <td>{{ $user->direccion }}</td>
                <td><b>Estado:</b></td>
                <td>
                    @if($user->activo==1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>


    @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
