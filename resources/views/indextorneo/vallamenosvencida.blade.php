@extends('indextorneo.infotorneo')

@section('paneltitle')
    VALLA MENOS VENCIDA
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
                    <th style="text-align: center;"><b>NOMBRE</b></th>
                    <th><b>EQUIPO</b></th>
                    <th><b>GOLES</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                <tr>
                    <td> {{ $numero++ }} </td>
                    <td> {{ $info->socio->nombre }} {{ $info->socio->apellido }}</td>
                    <td> {{ $info->equipo->nombre }}</td>
                    <td> {{ $info->goles }} </td>
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
            $("#navbar-nav2 a:contains('Valla menos vencida')").parent().addClass('active');
        });
    </script>
@stop