@extends('layouts.admin')
@section('pageheader')
    EDITAR EVENTO : {{$evento->nombre}}
@stop
@section('content')
    @include('partials.mensajes')
    {!! Form::open(['url' => 'eventos/actualizar', 'method' => 'post','files' => true]) !!}
    <div class="row">
        <input type="hidden" name="id" value="{{$evento->id}}">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height:55px">
                    Datos del evento
                    <button class="btn btn-success pull-right">Guardar evento</button>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="nombre">Nombre del evento:</label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                       value="{{$evento->nombre}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="fecha">Fecha:</label>
                                <input class="form-control" id="fecha" name="fecha" type="date"
                                       value="{{$evento->fecha}}" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="archivo">Imagen actual:</label>
                                    <img src="{{asset('img/eventos/'.$evento->archivo)}}"
                                         style="width: 100%; height: auto;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="archivo">Cambiar de imagen:</label>
                                    <input class="form-control" id="archivo" name="archivo" type="file" value="">
                                    <i style="color:slategray">(Dejar vacío si no se desea cambiar la imagen)</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="archivo">Información del evento:</label>
                                <textarea required id="informacion" name="informacion" class="form-control" rows="10"
                                          style="height: 300px">{{$evento->informacion}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <!-- include summernote css/js-->

    <link href="{{asset('summernote/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('summernote/summernote.js')}}"></script>
    <script src="{{asset('js/summernote-es.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#informacion').summernote({
                height: 500,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                lang: 'es-ES',

            });

        });
    </script>

@endsection