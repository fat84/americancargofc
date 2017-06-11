@extends('layouts.submenu')

@section('style')
    {{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('infotorneo')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="">
            <?php foreach(session('allprivilegios') as $privilegio) {
                if($privilegio->privilegio_id == 6 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalRegistro">
                    Agregar
                </button>

                <?php break;
                    }
                }
            ?>
        </div>

    </div>

    <div class="box container">
        <div class="box-header">

        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding ">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Equipo</th>
                        <th>Tarjetas Amarillas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tamarillas as $tamarillo)
                        <tr>
                            <td class="text-capitalize" >{{ $tamarillo->socio->nombre }} {{ $tamarillo->socio->apellido }}</td>
                            <td class="text-capitalize" >{{ $tamarillo->equipo->nombre }}</td>
                            <td class="text-capitalize" >{{ $tamarillo->tamarilla }}</td>

                            <td class="text-cente">
                                <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 6&& $privilegio->eliminar == 1) {
                                ?>
                                    <div class="btn-group">
                                        <a href="#" onclick="validar('{{url('deletetamarilla'.$tamarillo->id)}}', '¿Esta seguro de eliminar?')" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-remove"></i></a>
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
                {{ $tamarillas->appends(Request::only([]))->render() }}
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
                        {{ Form::open(['route' => ['storetamarilla'], 'method' => 'POST']) }}

                            @include('tamarillas.partials.formInfo')

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
            $("#siderbarsubmenu a:contains('Tarjetas amarillas')").parent().addClass('active');
        });
    </script>

    <script src="plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
            $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        });
    </script>
@stop