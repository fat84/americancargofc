@extends('indextorneo.infotorneo')

@section('paneltitle')
    FECHAS PARTIDOS
@stop

@section('panelcontenido')
    @if (session()->has('indexinfotorneo'))


        <div class="table-responsive no-padding">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th><b>FECHA</b></th>
                    <th><b>LUGAR</b></th>
                    <th><b>HORA</b></th>
                    <th><b>EQUIPO 1</b></th>
                    <th><b>GOLES</b></th>
                    <th><b>EQUIPO 2</b></th>
                    <th><b>GOLES</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                <tr>
                    <td> {{ \Carbon\Carbon::parse($info->fecha)->format('d-m-Y') }}</td>
                    <td> {{ $info->escenario->nombre }} </td>
                    <td> {{ $info->hora }} </td>
                    <td> {{ $info->equipoUno->nombre }} </td>
                    <td> {{ $info->golesuno }} </td>
                    <td> {{ $info->equipoDos->nombre }} </td>
                    <td> {{ $info->golesdos }} </td>
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
            $("#navbar-nav2 a:contains('Fechas Partido')").parent().addClass('active');
        });
    </script>
@stop