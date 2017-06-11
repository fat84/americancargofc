@extends('layouts.admin')

@section('pageheader')
    EDITAR PERFIL
@stop

@section('content')
    
    @include('partials.mensajes')

    <div class="box box-body">
        {{ Form::open(['route' => ['updateperfil'], 'method' => 'POST', 'files' => true]) }}

        @include('usuarios.partials.formInfoSesion')
        @include('usuarios.partials.formInfoPersonal')
        @include('usuarios.partials.formInfoConfiguracion')

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
        </div>

        {{ Form::close() }}

    </div>

@stop

@section('script')

@stop
