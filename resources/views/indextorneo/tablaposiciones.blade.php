@extends('indextorneo.infotorneo')

@section('paneltitle')
    TABLAS POSICIONES
@stop

@section('panelcontenido')
    @if (session()->has('indexinfotorneo'))


        <div class="table-responsive no-padding">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="text-align: center;"><b>EQUIPO</b></th>
                    <th><b>PJ</b></th>
                    <th><b>PG</b></th>
                    <th><b>PE</b></th>
                    <th><b>PP</b></th>
                    <th><b>GF</b></th>
                    <th><b>GC</b></th>
                    <th><b>DG</b></th>
                    <th><b>PTS</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                <tr>
                    <td> {{ $info->equipo->nombre }}</td>
                    <td> {{ $info->pj }} </td>
                    <td> {{ $info->pg }} </td>
                    <td> {{ $info->pe }} </td>
                    <td> {{ $info->pp }} </td>
                    <td> {{ $info->gf }} </td>
                    <td> {{ $info->gc }} </td>
                    <td> {{ $info->dg }} </td>
                    <td> {{ $info->pts }} </td>
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
            $("#navbar-nav2 a:contains('Tabla Posiciones')").parent().addClass('active');
        });
    </script>
@stop