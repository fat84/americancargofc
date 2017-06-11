@extends('layouts.submenu')

@section('style')

@stop

@section('infotorneo')

    @include('partials.mensajes')

    <div class="box-body row">

    </div>

    <div class="box container">
        <div class="box-header">
            <h4>Editar Equipo</h4>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{ Form::open(['route' => ['updateequipotorneo', $equipo->id], 'method' => 'POST']) }}

            <fieldset>
                <div class="row">
                    <div class='col-sm-12'>
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                            {{ Form::text('nombre',$equipo->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="box-footer pull-right">
                <a href="{{ url('equipostorneo') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Atras</a>
                <button type="submit" class="btn btn-primary ">Guardar</button>
            </div>

            {{ Form::close() }}

        </div>
    </div>

@stop

@section('script')
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneo')").parent().addClass('active');
            $("#siderbarsubmenu a:contains('Equipos')").parent().addClass('active');
        });
    </script>

@stop