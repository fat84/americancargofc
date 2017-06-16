@extends('layouts.index')

@section('contenido')
    <div class="gallery-head">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="principal.blade.html">Inicio</a></li>
                <li class="active">Galeria</li>
            </ol>
        </div>
        <div class="gallery-text">
            <div class="container">
                <h2>GALERIA</h2>
                <p></p>
            </div>
        </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div id="links">
                    @foreach($imagenes as $imagene)
                        <div class="col-md-3">
                            <a href="{{asset('galeria/imagenes/'.$imagene->archivo)}}" title="{{$imagene->titulo}}">
                                <img style="width: 200px;height: 200px" src="{{asset('galeria/imagenes/'.$imagene->archivo)}}" alt="{{$imagene->titulo}}">
                            </a>
                            <h1>{{$imagene->titulo}}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <script>
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    </script>
@stop