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
                    Nuevo Equipo
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
        <div class="box-body table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipos as $equipo)
                        <tr>
                            <td class="text-capitalize" >{{ $equipo->nombre }}</td>
                            <td>
                                <div class="btn-group">
                                    {{ Form::open(['route' => ['getjugadoresequipo', $equipo->idtorneoequipo], 'method' => 'GET']) }}
                                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Jugadores"><i class="fa fa-users"></i></button>
                                    {!! Form::close() !!}
                                </div>
                                    <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 6 && $privilegio->editar == 1) { ?>
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['editequipotorneo', $equipo->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
                                        {!! Form::close() !!}
                                    </div>

                                    <?php break;
                                    }
                                    }
                                    ?>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {{ $equipos->appends(Request::only([]))->render() }}
            </div>
        </div>
    </div>

    <!-- Modal formulario de registro -->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Nuevo Equipo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storeequipotorneo'], 'method' => 'POST']) }}
                        <div class="box-body">
                            <fieldset>
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <div class="form-group">
                                            {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                                            {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <p class="help-block" style="padding-left: 15px;">Los campos con asterisco (*) son obligatorios.</p>
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
            $("#siderbarsubmenu a:contains('Equipos')").parent().addClass('active');
        });
    </script>

@stop