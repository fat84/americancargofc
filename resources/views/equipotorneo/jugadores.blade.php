@extends('layouts.submenu')

@section('style')
    {{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('pageheader')
    JUGADORES PARTIDO

    <a href="{{ url('equipostorneo') }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Atras</a>
@stop

@section('infotorneo')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="col-md-6">


            {{ Form::model(Request::only(['search']),['route' => ['getjugadoresequipo', $idtorneoequipo], 'method' => 'GET']) }}
            <div class="input-group ">
                {{ Form::text('search',null,['class' => 'form-control', 'placeholder'=>'Buscar']) }}
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </div>
            </div><!-- /.input-group -->
            {{ Form::close() }}
        </div>

        <div class="">
            <?php foreach(session('allprivilegios') as $privilegio) {
                if($privilegio->privilegio_id == 6 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalRegistro">
                    Asignar Jugadores
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
                @foreach($jugadores as $jugador)
                    <tr>
                        <td class="text-capitalize" >{{ $jugador->nombre }} {{ $jugador->apellido }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" onclick="validar('{{url('deletejugadorequipo'.$jugador->tejid)}}', '¿Esta seguro de eliminar?')" class="btn btn-default pull-right"><i class="fa fa-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {{ $jugadores->appends(Request::only([]))->render() }}
            </div>

        </div>
    </div>


    <!-- Modal formulario de registro-->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary" id="boxbody">
                        <div class="box-header with-border">
                            <h4 class="box-title">Asignar Jugador</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['setjugadorequipo',$idtorneoequipo], 'method' => 'POST']) }}

                        <div class="row">
                            <div class='col-sm-12'>
                                <div class="form-group">
                                    {{ Form::label('user_id', 'Jugador*', ['class' => 'control-label']) }}

                                    <select name="user_id" id="user_id" class="form-control select2" required style="width: 100%;">
                                        <option value="">Seleccione Jugador</option>
                                        @foreach($socios as $socio)
                                            <option value="{{ $socio->id }}">{{ $socio->nombre }} {{ $socio->apellido }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <p class="help-block" style="padding-left: 15px;">Los campos con asterisco (*) son obligatorios.</p>
                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary pull-right"> Registrar</button>
                            </div>

                        {{ Form::close() }}

                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('script')
    <script src="plugins/select2/select2.full.min.js"></script>

    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneo')").parent().addClass('active');
            $("#siderbarsubmenu a:contains('Equipos')").parent().addClass('active');
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
            $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        });
    </script>

@stop