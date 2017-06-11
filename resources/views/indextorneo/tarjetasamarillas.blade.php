@extends('indextorneo.infotorneo')

@section('paneltitle')
    TARJETAS AMARILLAS
@stop

@section('css')
    {{ Html::style('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') }}
    {{ Html::style('https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css') }}
@stop

@section('panelcontenido')
    @if (session()->has('indexinfotorneo'))

        <div class="table-responsive no-padding">

            <table class="table table-hover" id="tablatamarillas">
                <thead>
                <tr>
                    <th style="text-align: center;"><b>NOMBRE</b></th>
                    <th><b>EQUIPO</b></th>
                    <th><b>TARJETA AMARILLAS</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $info)
                <tr>
                    <td> {{ $info->nombre }} {{ $info->apellido }}</td>
                    <td> {{ $info->nombreequipo }}</td>
                    <td> {{ $info->sumtamarilla }} </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif
@stop

@section('script')
    <script>
        $(function () {
            $("#navbar-nav2 a:contains('Tarjetas amarillas')").parent().addClass('active');
        });
    </script>

    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tablatamarillas').DataTable( {
                responsive: true,
                "order": [[ 2, "desc" ]]
            } );
        });
    </script>
@stop