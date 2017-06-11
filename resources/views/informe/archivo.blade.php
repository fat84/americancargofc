@extends('layouts.admin')

@section('style')

@stop

@section('pageheader')
    ARCHIVOS INFORME
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="">

        <a href="{{route('informe')}}" class="btn btn-success "><i class="fa fa-arrow-left"></i> Atras</a>

        <?php foreach(session('allprivilegios') as $privilegio) {
                if($privilegio->privilegio_id == 3 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalRegistro">
                    Agregar Archivo
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivos as $archivo)
                        <tr>
                            <td>{{ $archivo->nombre }}</td>

                            <td class="">

                                <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 3 && $privilegio->eliminar == 1) { ?>
                                    <div class="btn-group">
                                        <button type="submit" onclick="validar('{{url('eliminararchivo'.$archivo->id)}}', '¿Esta seguro de eliminar?')" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button>
                                    </div>

                                <?php break;
                                    }
                                }
                                ?>
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['descargararchivo', $archivo->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Descargar"><i class="glyphicon glyphicon-download-alt"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {{ $archivos->appends(Request::only([]))->render() }}
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
                            <h4 class="box-title">Agregar Archivo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storearchivo',$informeid], 'method' => 'POST', 'files' => true ]) }}

                        <fieldset>

                            <div class="row">
                                <div class='col-sm-12'>
                                    <div class="form-group">
                                        {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                                        {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class='col-sm-12'>
                                    <div class="form-group">
                                            {{ Form::label('archivo', 'Archivo PDF*', ['class' => 'control-label']) }}
                                            {{ Form::file('archivo', ['class' => 'control-label', 'required'=>'required']) }}
                                    </div>
                                </div>
                            </div>

                        </fieldset>

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
            $(".sidebar-menu a:contains('Informes')").parent().addClass('active');
        });
    </script>

@stop