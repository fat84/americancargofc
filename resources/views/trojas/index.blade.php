@extends('layouts.submenu')

@section('style')
    {{ Html::style('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') }}
    {{ Html::style('https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css') }}
@stop

@section('infotorneo')

    @include('partials.mensajes')

    <div class="box-body row">


    </div>

    <div class="box container">
        <div class="box-header">

        </div><!-- /.box-header -->
        <div class="box-body">

            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#trojas" aria-controls="trojas" role="tab" data-toggle="tab">Tarjetas Rojas</a></li>
                    <li role="presentation"><a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">Historial</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="trojas">
                        <br>
                        <div class="table-responsive ">
                            <table class="table table-hover" id="tablatrojas">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Equipo</th>
                                    <th>Tarjetas Rojas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trojas as $troja)
                                    <tr>
                                        <td class="text-capitalize" >{{ $troja->nombre}} {{ $troja->apellido }}</td>
                                        <td class="text-capitalize" >{{ $troja->nombreequipo }}</td>
                                        <td class="text-capitalize" >{{ $troja->sumtroja }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="historial">
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora Partido</th>
                                    <th>Minuto</th>
                                    <th>Nombre</th>
                                    <th>Equipo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($historial as $histo)
                                    <tr>
                                        <td class="text-capitalize" >{{ $histo->fecha }}</td>
                                        <td class="text-capitalize" >{{ $histo->hora }}</td>
                                        <td class="text-capitalize" >{{ $histo->minuto }}</td>
                                        <td class="text-capitalize" >{{ $histo->nombre}} {{ $histo->apellido }}</td>
                                        <td class="text-capitalize" >{{ $histo->nombreequipo }}</td>

                                        <td class="text-cente">
                                            <?php foreach(session('allprivilegios') as $privilegio) {
                                            if($privilegio->privilegio_id == 6&& $privilegio->eliminar == 1) {
                                            ?>
                                            <div class="btn-group">
                                                <a href="#" onclick="validar('{{url('deletetroja'.$histo->id)}}', '¿Esta seguro de eliminar?')" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            </div>
                                            <?php
                                            }
                                            } ?>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="pull-right">
                                {{ $historial->appends(Request::only([]))->render() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


@stop

@section('script')
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneo')").parent().addClass('active');
            $("#siderbarsubmenu a:contains('Tarjetas rojas')").parent().addClass('active');
        });
    </script>


    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tablatrojas').DataTable( {
                responsive: true,
                "order": [[ 2, "desc" ]]
            } );
        });
    </script>
@stop