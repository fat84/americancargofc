@extends('indextorneo.infotorneo')

@section('paneltitle')
    FIXTURY
@stop

@section('panelcontenido')
    @if (session()->has('indexinfotorneo'))
        <?php $informacion = session('indexinfotorneo')->fixtury; ?>

        @if(count($informacion->toArray()) > 0)
            <div class="center-block text-center" >
                <a href="{{route('indexdescargarfixtury')}}" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"> </i> Descargar Fixtury</a>
            </div>
        @endif
    @endif
@stop

@section('script')
    <script>
        $(function () {
            $("#navbar-nav2 a:contains('Fixtury')").parent().addClass('active');
        });
    </script>
@stop