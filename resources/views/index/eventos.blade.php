@extends('layouts.index')
@section('css')
    <style>.a-img {
            background-size: cover;
            height: 420px;
            display: block;
            background-position: center;
            width: 100%;
        }</style>
@endsection

@section('contenido')
    <div class="gallery-head">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <li class="active">Eventos</li>
            </ol>
        </div>
    </div>

    <div class="events-sec">
        <div class="container">
            <h2>Nuevos Eventos</h2>
            <div class="event-grids">

                @foreach($eventos as $evento)
                    <div class="col-md-6 event-grid">
                        <div class="date">
                            <h3>{{\date('d',strtotime($evento->fecha))}}</h3>
                            <span>{{\date('m/Y',strtotime($evento->fecha))}}</span>
                        </div>
                        <div class="event-grid_pic">
                            <div class="col-md-12">
                                <a href="{{url('eventos/detalle/'.$evento->id)}}">
                                    <div class="a-img" class="a-image"
                                         style="background-image: url('{{asset('img/eventos/'.$evento->archivo)}}');"></div>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <h3><a href="{{url('eventos/detalle/'.$evento->id)}}">{{$evento->nombre}}</a></h3>
                                <div class="col-md-12" style="height:40px; overflow: scroll; overflow-y: hidden; overflow-x: hidden">
                                    <p>
                                        @php
                                            $infosplit = explode("</p>", $evento->informacion);
                                            $info = "";
                                            foreach ($infosplit as $temp){
                                                if(strpos($temp,'data:image/')!==false || strlen($temp)<=10){
                                                }else{
                                                    $info = $temp;
                                                    break;
                                                }

                                            }
                                            $info =  str_replace('<p>','',$info);
                                            echo substr($info, 0 , 500).'...';
                                        @endphp
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <div class="more"><a href="{{url('eventos/detalle/'.$evento->id)}}">> Leer mas</a></div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <center>
                {{$eventos->links()}}
            </center>
        </div>
    </div>

    <script>

    </script>
@stop