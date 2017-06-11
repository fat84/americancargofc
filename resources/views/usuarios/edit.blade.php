@extends('layouts.admin')

@section('style')
    {{ Html::style('css/formwizard.css') }}
@stop

@section('pageheader')
    EDITAR USUARIO
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box box-body">

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

        {{ Form::open(['route' => ['updateusuario', $user->id], 'method' => 'POST', 'files' => true]) }}

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

                {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>--}}
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>


        {{--@include('usuarios.partials.formInfoSesion')
        @include('usuarios.partials.formInfoPersonal')
        @include('usuarios.partials.formInfoConfiguracion')

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
        </div>--}}

        {{ Form::close() }}

    </div>

@stop

@section('script')
    {{--{{ Html::script('dist/js/bootstrap-switch.js') }}--}}
    {{ Html::script('js/formwizard.js') }}

    <script>
        $(function(argument) {
//            $("[name='activo']").bootstrapSwitch();
//            $("[name='segdoblepaso']").bootstrapSwitch();
//            $("[name='alertsesion']").bootstrapSwitch();
        })
    </script>

    <script>
        $(function () {
            $(".sidebar-menu a:contains('Usuarios')").parent().addClass('active');
        });
    </script>
@stop
