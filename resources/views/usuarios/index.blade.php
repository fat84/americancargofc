@extends('layouts.admin')

@section('style')
    {{ Html::style('dist/css/usuario/usuario.css') }}
    {{ Html::style('css/formwizard.css') }}
@stop

@section('pageheader')
    USUARIOS
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="col-md-6">

            {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
            <div class="input-group ">
                {{ Form::text('search',null,['class' => 'form-control', 'placeholder'=>'Buscar']) }}
                {{ Form::hidden('orden') }}
                {{ Form::hidden('filtrorol') }}
                {{ Form::hidden('filtroestado') }}
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </div>
            </div><!-- /.input-group -->
            {{ Form::close() }}
        </div>

        <div class="">
            <?php foreach(session('allprivilegios') as $privilegio) {
                if($privilegio->privilegio_id == 1 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalUser">
                    <i class="fa fa-user-plus"></i> Nuevo Usuario
                </button>

                <?php break;
                    }
                }
            ?>
        </div>

    </div>

    <div class="box container">
        <div class="box-header">

            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('orden','nombre') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('filtrorol') }}
                        {{ Form::hidden('filtroestado') }}
                                <button type="submit" class="btn btnmenu">Nombre</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('orden','apellido') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('filtrorol') }}
                        {{ Form::hidden('filtroestado') }}
                        <button type="submit" class="btn btnmenu">Apellido</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('orden','rol_id') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('filtrorol') }}
                        {{ Form::hidden('filtroestado') }}
                        <button type="submit" class="btn btnmenu">Rol</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('orden','email') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('filtrorol') }}
                        {{ Form::hidden('filtroestado') }}
                        <button type="submit" class="btn btnmenu">Email</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('orden','activo') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('filtrorol') }}
                        {{ Form::hidden('filtroestado') }}
                        <button type="submit" class="btn btnmenu">Estado</button>
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>

            <!-- Filtro Rol -->
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtro Rol <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('filtrorol', '') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('orden') }}
                        {{ Form::hidden('filtroestado') }}
                        <button type="submit" class="btn btnmenu">No Filtrar</button>
                        {{ Form::close() }}
                    </li>
                    @foreach($roles as $idrol=>$nombrerol)
                        <li>
                            {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                            {{ Form::hidden('filtrorol', $idrol) }}
                            {{ Form::hidden('search') }}
                            {{ Form::hidden('orden') }}
                            {{ Form::hidden('filtroestado') }}
                            <button type="submit" class="btn btnmenu">{{ $nombrerol }}</button>
                            {{ Form::close() }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Filtro Estado -->
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtro Estado <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('filtroestado', '') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('orden') }}
                        {{ Form::hidden('filtrorol') }}
                        <button type="submit" class="btn btnmenu">No Filtrar</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('filtroestado', 1) }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('orden') }}
                        {{ Form::hidden('filtrorol') }}
                        <button type="submit" class="btn btnmenu">Activo</button>
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['usuario'], 'method' => 'GET']) }}
                        {{ Form::hidden('filtroestado', 0) }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('orden') }}
                        {{ Form::hidden('filtrorol') }}
                        <button type="submit" class="btn btnmenu">Inactivo</button>
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>

            <!-- Exportar -->
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download"></i> Exportar
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::open(['route' => ['pdfusuarios'], 'method' => 'POST']) }}
                        {{ Form::hidden('orden','apellido') }}
                        <button type="submit" class="btn btnmenu">Todo</button>
                        {{ Form::close() }}
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::model(Request::only(['search','orden','filtrorol','filtroestado']),['route' => ['pdfusuarios'], 'method' => 'POST']) }}
                        {{ Form::hidden('filtroestado') }}
                        {{ Form::hidden('search') }}
                        {{ Form::hidden('orden') }}
                        {{ Form::hidden('filtrorol') }}
                        <button type="submit" class="btn btnmenu">Filtrados</button>
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>

        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding ">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-capitalize">{{ $user->nombre }}</td>
                            <td class="text-capitalize">{{ $user->apellido }}</td>
                            <td>{{ $user->rol->nombre }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->activo==1)
                                    <span class="label label-success">Activo</span>
                                @else
                                    <span class="label label-danger">Inactivo</span>
                                @endif
                            </td>

                            <td class="text-cente">

                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['showusuario', $user->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default"><i class="fa fa-user"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                <?php foreach(session('allprivilegios') as $privilegio) {
                                    if($privilegio->privilegio_id == 1 && $privilegio->editar == 1) { ?>
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['editarusuario', $user->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i></button>
                                        {!! Form::close() !!}
                                    </div>

                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['privilegiosusuario', $user->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default"><i class="fa fa-key"></i></button>
                                        {{ Form::close() }}
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
                {{ $users->appends(Request::only(['search', 'orden','filtrorol','filtroestado']))->render() }}
            </div>
        </div>
    </div>

    <!-- Modal formulario de registro de usuario-->
    <div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Usuario</h4>
                </div>-->
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Nuevo Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-sesion" type="button" class="btn btn-primary btn-circle">IS</a>
                                    <p>Inicio Sesion</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-personal" type="button" class="btn btn-default btn-circle" disabled="disabled">P</a>
                                    <p>Personal</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-infoclub" type="button" class="btn btn-default btn-circle" disabled="disabled">C</a>
                                    <p>Club</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-infofamiliar" type="button" class="btn btn-default btn-circle" disabled="disabled">F</a>
                                    <p>Familiar</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-laboral" type="button" class="btn btn-default btn-circle" disabled="disabled">L</a>
                                    <p>Laboral</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-salud" type="button" class="btn btn-default btn-circle" disabled="disabled">S</a>
                                    <p>Salud</p>
                                </div>
                            </div>
                        </div>

                        <!-- form start -->
                        {{ Form::open(['route' => ['storeusuario'], 'method' => 'POST', 'files' => true]) }}

                            <div class="row setup-content" id="step-sesion">
                                <div class="col-xs-12">
                                    <legend>Información Inicio De Sesión</legend>
                                    @include('usuarios.partials.formInfoSesion')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button class="btn btn-primary nextBtn pull-right" type="button" >Siguiente</button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-personal">
                                <div class="col-xs-12">
                                    <legend>Información Personal</legend>
                                    @include('usuarios.partials.formInfoPersonal')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button class="btn btn-primary nextBtn pull-right" type="button" >Siguiente</button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-infoclub">
                                <div class="col-xs-12">
                                    <legend>Información Club</legend>
                                    @include('usuarios.partials.formInfoClub')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button class="btn btn-primary nextBtn pull-right" type="button" >Siguiente</button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-infofamiliar">
                                <div class="col-xs-12">
                                    <legend>Información Familiar</legend>
                                    @include('usuarios.partials.formInfoFamiliar')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button class="btn btn-primary nextBtn pull-right" type="button" >Siguiente</button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-laboral">
                                <div class="col-xs-12">
                                    <legend>Información Laboral/Profesional</legend>
                                    @include('usuarios.partials.formInfolaboral')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button class="btn btn-primary nextBtn pull-right" type="button" >Siguiente</button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-salud">
                                <div class="col-xs-12">
                                    <legend>Información Salud</legend>
                                    @include('usuarios.partials.formInfoSalud')
                                    <p class="help-block">Los campos con asterisco (*) son obligatorios.</p>

                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Registrar</button>
                                </div>
                            </div>

                        {{ Form::close() }}

                    </div><!-- /.box -->

                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




@stop

@section('script')
    {{ Html::script('js/formwizard.js') }}
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Usuarios')").parent().addClass('active');
        });
    </script>
@stop