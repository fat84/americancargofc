@extends('layouts.admin')
@section('pageheader')
    NUEVO EVENTO
@stop
@section('content')
    @include('partials.mensajes')
    {!! Form::open(['url' => 'eventos/guardar', 'method' => 'post','files' => true]) !!}
    <div class="row">
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
                                <input class="form-control" id="nombre" name="nombre" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="fecha">Fecha:</label>
                                <input class="form-control" id="fecha" name="fecha" type="date" value="" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label" for="archivo">Archivo de imagen:</label>
                                <input class="form-control" id="archivo" name="archivo" type="file" value="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="archivo" >Información del evento:</label>
                                <textarea  required id="informacion" name="informacion" class="form-control" rows="10" style="height: 300px"></textarea>
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
        $(document).ready(function() {
            $('#informacion').summernote({
                height: 500,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                lang: 'es-ES'
            });
        });
    </script>

@endsection