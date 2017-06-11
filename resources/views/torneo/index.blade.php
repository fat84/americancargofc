@extends('layouts.admin')

@section('style')
    {{ Html::style('dist/css/usuario/usuario.css') }}
@stop

@section('pageheader')
    TORNEOS
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="col-md-6">

            {{ Form::model(Request::only(['search']),['route' => ['torneos'], 'method' => 'GET']) }}
            <div class="input-group ">
                {{ Form::text('search',null,['class' => 'form-control', 'placeholder'=>'Buscar']) }}
                {{ Form::hidden('orden') }}
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
                    Nuevo Torneo
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
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Visible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($torneos as $torneo)
                        <tr>
                            <td class=""><a href="{{route('infotorneo',$torneo->id)}}"><span>{{ str_limit(strip_tags($torneo->nombre), $limit = 50, $end = '...') }}</span></a></td>
                            <td class="text-capitalize">{{ $torneo->fechaini }}</td>
                            <td class="text-capitalize">{{ $torneo->fechafin }}</td>
                            <td class="text-capitalize">
                                @if($torneo->visible==1)
                                    <span class="glyphicon glyphicon-ok" style="color: #3c763d;"></span>
                                @else
                                    <span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
                                @endif
                            </td>
                            <td class="text-cente">
                                <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 6 && $privilegio->editar == 1) { ?>
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['editartorneo', $torneo->id], 'method' => 'POST']) }}
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
                {{ $torneos->appends(Request::only(['search']))->render() }}
            </div>
        </div>
    </div>

    <!-- Modal formulario de registro de torneo-->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Nuevo Torneo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storetorneo'], 'method' => 'POST', 'files' => true]) }}

                            @include('torneo.partials.formInfo')
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
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneos')").parent().addClass('active');
        });
    </script>
@stop