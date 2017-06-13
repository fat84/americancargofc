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
                @foreach($imagenes as $imagene)
                    <div class="col-sm-6 col-md-4">
                        <a href="{{url('galeria/individuals/'.$imagene->id)}}">  <div class="thumbnail">
                                <img style="width: 200px;height: 200px" src="{{asset('galeria/imagenes/'.$imagene->archivo)}}">
                                <div class="caption">
                                    <center>
                                        <h3 style="text-transform: uppercase">{{$imagene->titulo}}</h3>
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@stop