@extends('layouts.index')

@section('contenido')

    <div class="col-md-10 col-md-offset-1 col-sm-12" style="" id="eventoinformacion">
        <br>

        @if (session()->has('cantinfoevento'))

            @if(count(session('cantinfoevento')['banners']->toArray()) > 0)
                <!-- Imagenes -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $cant=0;
                        ?>
                        @foreach(session('cantinfoevento')['banners'] as $banner)
                            @if($cant == 0)
                                <div class="item active">
                                    <img src="{{ $banner->imagen }}" alt="">
                                </div>
                                <?php $cant=1; ?>
                            @else
                                <div class="item">
                                    <img src="{{ $banner->imagen }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if(count(session('cantinfoevento')['banners']->toArray()) > 1)
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>
            @endif
        @endif
        <br>


        <!-- Menu -->
        <div class="col-md-3 col-sm-3" style="padding-left: 0; padding-right: 0;">
            <nav class="navbar navbar-default" role="navigation" id="navbar2" style="background-color: #ffffff;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" id="navbar-header2" style="background: #aa1916;">
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
                        @if (session()->has('cantinfoevento'))

                            <?php
                            $cantinfoevento = session('cantinfoevento');
                            ?>

                            @if($cantinfoevento['sumafechas'] > 0)
                                <li><a href="{{route('registroaevento')}}" >Registro</a></li>
                            @endif
                            @if($cantinfoevento['informacion'] > 0)
                                <li><a href="{{route('indexinformacion')}}" >Información</a></li>
                            @endif
                            @if($cantinfoevento['ejetematico'] > 0)
                                <li><a href="{{route('indexejetematico')}}"><span>Ejes Temáticos</span></a></li>
                            @endif
                            @if($cantinfoevento['conferencista'] > 0)
                                <li><a href="{{route('indexconferencistas')}}"><span>Conferencistas</span></a></li>
                            @endif
                            @if($cantinfoevento['encargado'] > 0)
                                <li><a href="{{route('indexencargados')}}"><span>Encargados</span></a></li>
                            @endif
                            @if($cantinfoevento['patrocinador'] > 0)
                                <li><a href="{{route('indexpatrocinadores')}}"><span>Patrocinadores</span></a></li>
                            @endif
                            @if($cantinfoevento['ponencia'] > 0)
                                <li><a href="{{route('indexponencia')}}"><span>Ponencias</span></a></li>
                            @endif
                            @if($cantinfoevento['programacion'] > 0)
                                <li><a href="{{route('indexprogramacion')}}"><span>Programación</span></a></li>
                            @endif
                            @if($cantinfoevento['memoria'] > 0)
                                <li><a href="{{route('indexmemorias')}}"><span>Memorias</span></a></li>
                            @endif
                            @if($cantinfoevento['fecha'] > 0)
                                <li><a href="{{route('indexfechas')}}"><span>Fechas/Costo</span></a></li>
                            @endif
                            @if($cantinfoevento['formapago'] > 0)
                                <li><a href="{{route('indexformadepago')}}"><span>Forma De Pago</span></a></li>
                            @endif

                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="col-md-9 col-sm-9" style="padding-right: 0;" id="panelinfo">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #aa1916; color: #ffffff;">
                    <h3 class="panel-title">@yield('paneltitle')</h3>
                </div>
                <div class="panel-body">
                    @yield('panelcontenido')
                </div>
            </div>

        </div>



    </div>

@stop

