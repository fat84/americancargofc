@extends('indextorneo.infotorneo')

@section('paneltitle')
    SANCIONES DISCIPLINARIAS
@stop

@section('panelcontenido')
    @if (session()->has('indexinfotorneo'))
        <?php
        $numero = 1;
        ?>

        <div class="table-responsive no-padding">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th><b>#</b></th>
                    <th><b>NOMBRE</b></th>
                    <th><b>EQUIPO</b></th>
                    <th><b>INFRACCION</b></th>
                    <th><b>FECHA</b></th>
                    <th><b>CANTIDAD FECHAS</b></th>
                    <th><b>DESDE</b></th>
                    <th><b>HASTA</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                <tr>
                    <td> {{ $numero++ }} </td>
                    <td> {{ $info->socio->nombre }} {{ $info->socio->apellido }}</td>
                    <td> {{ $info->equipo->nombre }}</td>
                    <td> {{ $info->infraccion }} </td>
                    <td> {{ $info->fecha }} </td>
                    <td style="text-align: center;"> {{ $info->canfechas }} </td>
                    <td> {{ $info->desde }} </td>
                    <td> {{ $info->hasta }} </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $informacion->appends(Request::only([]))->render() }}
            </div>
        </div>

    @endif
@stop

@section('script')
    <script>
        $(function () {
            $("#navbar-nav2 a:contains('Sanciones')").parent().addClass('active');
        });
    </script>
@stop