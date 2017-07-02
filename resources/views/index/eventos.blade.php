@extends('layouts.index')

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
                            <div style="width: 500px;height: 420px">
                                <a href="{{url('eventos/detalle/'.$evento->id)}}">
                                    <center><img
                                                src="{{asset('img/eventos/'.$evento->archivo)}}"
                                                alt="{{$evento->nombre}}"
                                                style="width: 100%; height: auto;"/></center>
                                </a>
                            </div>
                            <h3><a href="{{url('eventos/detalle/'.$evento->id)}}">{{$evento->nombre}}</a></h3>
                            <div class="col-md-12">
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
                            <div class="more"><a href="{{url('eventos/detalle/'.$evento->id)}}">> Leer mas</a></div>
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