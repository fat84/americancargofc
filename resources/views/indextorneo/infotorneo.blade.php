@extends('layouts.index')

@section('contenido')
<div class="row">
<br>
<br>
    <div class="col-md-10 col-md-offset-1 col-sm-12" style="" id="eventoinformacion">


        <!-- Menu -->
        <div class="col-md-3 col-sm-3" style="padding-left: 0; padding-right: 0;">
            <nav class="navbar navbar-default" role="navigation" id="navbar2" style="background-color: #ffffff;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" id="navbar-header2" style="background: #ed645c;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">Menu</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse" id="collapse navbar-collapse2">
                    <ul class="nav navbar-nav" id="navbar-nav2">
                        <li><a href="{{ route('indexfechaspartido') }}"><span>Fechas Partido</span></a></li>
                        {{--<li><a href="{{ route('indextablaposiciones') }}"><span>Tabla Posiciones</span></a></li>--}}
                        {{--<li><a href="{{ route('indexvallamenosvencida') }}"><span>Valla menos vencida</span></a></li>--}}
                        <li><a href="{{ route('indexgoleadores') }}"><span>Goleadores</span></a></li>
                        <li><a href="{{ route('indextarjetasrojas') }}"><span>Tarjetas rojas</span></a></li>
                        <li><a href="{{ route('indextarjetasamarillas') }}"><span>Tarjetas amarillas</span></a></li>
                        <li><a href="{{ route('indexinfoequipo') }}"><span>Equipos</span></a></li>
                        {{--<li><a href="{{ route('indexsanciones') }}"><span>Sanciones</span></a></li>--}}
                        {{--<li><a href="{{ route('indexfixtury') }}"><span>Fixtury</span></a></li>--}}
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="col-md-9 col-sm-9" style="padding-right: 0;" id="panelinfo">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #ed645c; color: #ffffff;">
                    <h3 class="panel-title">@yield('paneltitle')</h3>
                </div>
                <div class="panel-body">
                    @yield('panelcontenido')
                </div>
            </div>

        </div>



    </div>

</div>
@stop

