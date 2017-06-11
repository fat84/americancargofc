@extends('layouts.admin')

@section('pageheader')
    INFORMACIÓN USUARIO
@stop

@section('content')
    <div class="box box-body">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#sesion" aria-controls="sesion" role="tab" data-toggle="tab">Inicio Sesion</a></li>
                <li role="presentation"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal</a></li>
                <li role="presentation"><a href="#club" aria-controls="club" role="tab" data-toggle="tab">Club</a></li>
                <li role="presentation"><a href="#familiar" aria-controls="familiar" role="tab" data-toggle="tab">Familiar</a></li>
                <li role="presentation"><a href="#laboral" aria-controls="laboral" role="tab" data-toggle="tab">Laboral</a></li>
                <li role="presentation"><a href="#salud" aria-controls="salud" role="tab" data-toggle="tab">Salud</a></li>
            </ul>


            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sesion">
                    @include('usuarios.partials.formInfoSesion')
                </div>
                <div role="tabpanel" class="tab-pane" id="personal">
                    @include('usuarios.partials.formInfoPersonal')
                </div>
                <div role="tabpanel" class="tab-pane" id="club">
                    @include('usuarios.partials.formInfoClub')
                </div>
                <div role="tabpanel" class="tab-pane" id="familiar">
                    @include('usuarios.partials.formInfoFamiliar')
                </div>
                <div role="tabpanel" class="tab-pane" id="laboral">
                    @include('usuarios.partials.formInfolaboral')
                </div>
                <div role="tabpanel" class="tab-pane" id="salud">
                    @include('usuarios.partials.formInfoSalud')
                </div>

            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div>

@stop

@section('script')
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Usuarios')").parent().addClass('active');
        });
    </script>
@stop