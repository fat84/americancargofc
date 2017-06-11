
@extends('layouts.admin')

@section('style')
    {{ Html::style('dist/css/usuario/usuario.css') }}
    {{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('pageheader')
<div class="" style="display: inline;">
    <h3 style="display: inline;">TORNEO:</h3>
    <h4 style="display: inline;">
        <?php
        if(session()->has('infotorneo')) {
        ?>
        {{session('infotorneo')->nombre}}
        <?php
        }
        ?>
    </h4>
</div>
    <div class="pull-right"><a href="{{route('torneos')}}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Atras</a></div>

@stop

@section('content')


    <div class="">
        {{-- SubNav moviles--}}
        <nav class="navbar navbar-default visible-xs visible-sm">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="#"> Sub Menu</a></h1>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('fechapartido') }}"><span>Fechas Partido</span></a></li>
                        {{--<li><a href="{{ route('posiciones') }}"><span>Tabla Posiciones</span></a></li>--}}
                        {{--<li><a href="{{ route('vallamenosvencida') }}"><span>Valla menos vencida</span></a></li>--}}
                        <li><a href="{{ route('goleadores') }}"><span>Goleadores</span></a></li>
                        <li><a href="{{ route('tarjetasrojas') }}"><span>Tarjetas rojas</span></a></li>
                        <li><a href="{{ route('tarjetasamarillas') }}"><span>Tarjetas amarillas</span></a></li>
                        <li><a href="{{ route('equipostorneo') }}"><span>Equipos</span></a></li>
                        {{--<li><a href="{{ route('sanciones') }}"><span>Sanciones</span></a></li>
                        <li><a href="{{ route('fixturys') }}"><span>Fixtury</span></a></li>--}}
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>


    <div class="box container" style="padding-left: 0;">
        <div class="">

            <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 0;">
                <ul class="sidebar-menu" style="border-right: 1px solid #d2d6de;" id="siderbarsubmenu">
                    <li class="header">SUBMENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{ route('fechapartido') }}"><span>Fechas Partido</span></a></li>
                    {{--<li><a href="{{ route('posiciones') }}"><span>Tabla Posiciones</span></a></li>--}}
                    {{--<li><a href="{{ route('vallamenosvencida') }}"><span>Valla menos vencida</span></a></li>--}}
                    <li><a href="{{ route('goleadores') }}"><span>Goleadores</span></a></li>
                    <li><a href="{{ route('tarjetasrojas') }}"><span>Tarjetas rojas</span></a></li>
                    <li><a href="{{ route('tarjetasamarillas') }}"><span>Tarjetas amarillas</span></a></li>
                    <li><a href="{{ route('equipostorneo') }}"><span>Equipos</span></a></li>
                    {{--<li><a href="{{ route('sanciones') }}"><span>Sanciones</span></a></li>
                    <li><a href="{{ route('fixturys') }}"><span>Fixtury</span></a></li>--}}
                </ul><!-- /.sidebar-menu -->
            </div>



            <div class="col-md-10">
                @yield('infotorneo')
            </div>
        </div><!-- /.box-header -->

    </div>





@stop

@section('script')

@stop