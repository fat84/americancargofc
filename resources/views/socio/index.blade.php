@extends('layouts.admin')

@section('style')

@stop

@section('pageheader')
    SOCIOS
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="col-md-6">


            {{ Form::model(Request::only(['search']),['route' => ['socios'], 'method' => 'GET']) }}
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
                if($privilegio->privilegio_id == 7 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalRegistro">
                    Nuevo Socio
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
                        <th>Apellido</th>
                        <th>Tipo Documento</th>
                        <th>Numero Documento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($socios as $socio)
                        <tr>
                            <td>{{ $socio->nombre }}</td>
                            <td>{{ $socio->apellido }}</td>
                            <td>{{ $socio->tipoDocumento->nombre }}</td>
                            <td>{{ $socio->identificacion }}</td>

                            <td class="text-cente">


                                <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 7 && $privilegio->editar == 1) { ?>
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['editarsocio', $socio->id], 'method' => 'POST']) }}
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
                {{ $socios->appends(Request::only(['search']))->render() }}
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
                            <h4 class="box-title">Nuevo Informe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storesocio'], 'method' => 'POST']) }}

                            @include('socio.partials.formInfo')
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
            $(".sidebar-menu a:contains('Socios')").parent().addClass('active');
        });
    </script>

@stop