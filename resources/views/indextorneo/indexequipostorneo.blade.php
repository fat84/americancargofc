@extends('indextorneo.infotorneo')

@section('paneltitle')
    EQUIPOS
@stop

@section('panelcontenido')

    @if (session()->has('indexinfotorneo'))
        <div class="table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><b>Nombre Equipo</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                    <tr>
                        <td class=""><a href="{{route('indexjuadoresequipo',$info->idtorneoequipo)}}"><span>{{ $info->nombre }}</span></a></td>
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
            $("#navbar-nav2 a:contains('Equipos')").parent().addClass('active');
        });
    </script>
@stop