@extends('layouts.admin')

@section('pageheader')
    PERFIL
@stop

@section('content')

    @include('partials.mensajes')

            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#informacion" data-toggle="tab">Información</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="informacion">
                        @include('usuarios.partials.formInfoSesion')
                        @include('usuarios.partials.formInfoPersonal')
                        @include('usuarios.partials.formInfoConfiguracion')

                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
@stop

@section('script')

@stop
