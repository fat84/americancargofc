@extends('layouts.index')

@section('contenido')
    <div class="gallery-head">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <li href="{{url('eventos/lista')}}">Eventos</li>
                <li class="active">{{$evento->nombre}}</li>
            </ol>
            <br>
            <hr/>
            <br>
            <h1>{{$evento->nombre}}</h1>
            <h3><i>{{$evento->fecha}}</i></h3>
        </div>
        <br><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                <img class="img-thumbnail" src="{{asset('img/eventos/'.$evento->archivo)}}"
                     style="width: 100%; height: auto"/>
            </div>
            <div class="col-md-10 col-lg-offset-1 text-justify">
                <br><br>
                {!! $evento->informacion !!}
            </div>
        </div>
    </div>


    <script>
    </script>
@stop