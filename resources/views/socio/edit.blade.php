@extends('layouts.admin')

@section('style')

@stop

@section('pageheader')
    EDITAR SOCIO
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box box-body">
        <a href="{{ URL::previous() }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Atras</a>
        {{ Form::open(['route' => ['updatesocio', $socio->id], 'method' => 'POST']) }}

        @include('socio.partials.formInfo')
        <p class="help-block" style="padding-left: 15px;">Los campos con asterisco (*) son obligatorios.</p>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
        </div>

        {{ Form::close() }}

    </div>

@stop

@section('script')
    <script>
        $(function () {
                $(".sidebar-menu a:contains('Socios')").parent().addClass('active');
        });
    </script>
@stop
