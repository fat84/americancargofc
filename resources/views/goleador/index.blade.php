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
                    <li role="presentation" class="active"><a href="#goleadores" aria-controls="goleadores" role="tab" data-toggle="tab">Goleadores</a></li>
                    <li role="presentation"><a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">Historial</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="goleadores">
                        <br>
                        <div class="table-responsive ">
                            <table class="table table-hover" id="tablagoleadores">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Equipo</th>
                                    <th>Goles</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($goleadores as $goleador)
                                    <tr>
                                        <td class="text-capitalize" >{{ $goleador->nombre}} {{ $goleador->apellido }}</td>
                                        <td class="text-capitalize" >{{ $goleador->nombreequipo }}</td>
                                        <td class="text-capitalize" >{{ $goleador->sumgoles }}</td>
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
                                    <th>Minuto Gol</th>
                                    <th>Nombre</th>
                                    <th>Gol A Equipo</th>
                                    <th>Auto Gol</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($historialgoles as $hgol)
                                    <tr>
                                        <td class="text-capitalize" >{{ $hgol->fecha }}</td>
                                        <td class="text-capitalize" >{{ $hgol->hora }}</td>
                                        <td class="text-capitalize" >{{ $hgol->minuto }}</td>
                                        <td class="text-capitalize" >{{ $hgol->nombre}} {{ $hgol->apellido }}</td>
                                        <td class="text-capitalize" >{{ $hgol->nombreequipo }}</td>
                                        <td class="text-capitalize" >
                                            @if($hgol->autogol == 1)
                                                Sí
                                            @else
                                                --
                                            @endif
                                        </td>

                                        <td class="text-cente">
                                            <?php foreach(session('allprivilegios') as $privilegio) {
                                            if($privilegio->privilegio_id == 6&& $privilegio->eliminar == 1) {
                                            ?>
                                            <div class="btn-group">
                                                <a href="#" onclick="validar('{{url('deletegoleador'.$hgol->id)}}', '¿Esta seguro de eliminar?')" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-remove"></i></a>
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
                                {{ $historialgoles->appends(Request::only([]))->render() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <!-- Modal formulario de registro de info general-->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Agregar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storegoleador'], 'method' => 'POST']) }}

                            @include('goleador.partials.formInfo')

                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                            </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




@stop

@section('script')
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneo')").parent().addClass('active');
            $("#siderbarsubmenu a:contains('Goleadores')").parent().addClass('active');
        });
    </script>


    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tablagoleadores').DataTable( {
                responsive: true,
                "order": [[ 2, "desc" ]]
            } );
        });
    </script>
@stop