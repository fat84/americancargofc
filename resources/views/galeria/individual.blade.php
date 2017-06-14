@extends('layouts.admin')
@section('pageheader')
    GALERIA: <span style="text-transform: uppercase">{{$galeria->nombre}}</span>
@stop
@section('content')
    @include('partials.mensajes')


            <div class="panel panel-primary">
                <div class="panel-heading">
                    Arroja los arhivos aqui
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=> 'galeriass.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <input hidden name="galeria_id" value="{{$galeria->id}}">
                    <div class="dz-message" style="height:200px;">
                        Arroja los archivos
                    </div>
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Subir</button>
                    {!! Form::close() !!}
                </div>
            </div>




  <!--  <div class="panel panel-default">
        <div class="panel-heading">
            Arroja las imagenes
        </div>
        <div class="panel-body">
            {!! Form::open(['route'=> 'galeriass.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
            <input hidden name="galeria_id" value="{{$galeria->id}}">
            <div class="dz-message" style="height:200px;">
                Deja tus archivos aquí
            </div>
            <div class="dropzone-previews"></div>
            <button type="submit" class="btn btn-success" id="submit">Subir</button>
            {!! Form::close() !!}
        </div>
    </div>




   <!-- <div class="panel panel-default">
        {!! Form::open(['url' => 'agregarImagen', 'method' => 'post','files' => true]) !!}
        <div class="panel-heading">AÑADIR IMAGEN A GALERIA <div class="pull-right">
                <button type="submit" class="btn btn-success">Guardar Galeria</button>
            </div></div>
        <div class="panel-body">
            <div class="col-lg-6">
                <div class="input-group">
                    <label for="">Titulo de la imagen*</label>
                    <input id="titulo" name="titulo" required class="form-control" placeholder="Titulo de la Galeria">
                    <input hidden name="galeria_id" value="{{$galeria->id}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <label for="">Imagen*</label>
                    <input id="titulo" name="imagen" type="file" required class="form-control" placeholder="Titulo de la Galeria">
                </div>
            </div>
            <br>
        </div>
        {!! Form::close() !!}
    </div>-->


        <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
            @foreach($imagenes as $imagenes)


                        <div class="col-md-4" style="height: 400px">
                            <div class="thumbnail">
                                <img style="width: 200px;height: 200px" src="{{asset('galeria/imagenes/'.$imagenes->archivo)}}">
                                <div class="caption">
                                 <center>
                                     <p style="font-weight: bold">{{$imagenes->titulo}}</p>
                                    <p><a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#myModal{{$imagenes->id}}">Editar</a>
                                        <a href="#" class="btn btn-danger" onclick="alertEliminar{{$imagenes->id}}()" role="button">Eliminar</a></p>
                                     <br>
                                 </center>
                                </div>
                            </div>
                        </div>
                    <form id="eliminarImagen{{$imagenes->id}}" action="{{url('eliminarImagen/'.$imagenes->id.'/'.$galeria->id)}}" method="get">
                    </form>
                    <script>
                        function alertEliminar{{$imagenes->id}}() {
                            swal({
                                    title: "¿Esta seguro?",
                                    text: "Desea eliminar esta imagen",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Si, Eliminar!",
                                    cancelButtonText: "No, Cancelar!",
                                    closeOnConfirm: false,
                                    closeOnCancel: false
                                },
                                function(isConfirm){
                                    if (isConfirm) {
                                        swal("Anulada!", "Imagen eliminada", "success");
                                        $('#eliminarImagen{{$imagenes->id}}').submit();

                                    } else {
                                        swal("Cancelado", "Ha sido cancelado :)", "error");
                                    }
                                });
                        }
                    </script>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$imagenes->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Editar titulo</h4>
                                </div>
                                {!! Form::open(['url' => 'actualizarImagen', 'method' => 'post','files' => true]) !!}
                                    <input hidden name="idImagen" value="{{$imagenes->id}}">
                                    <div class="modal-body">
                                        <center>
                                            <img style="width: 200px;height: 200px" src="{{asset('galeria/imagenes/'.$imagenes->archivo)}}">
                                           <div class="input-group">
                                               <label>Cambiar Imagen</label>
                                            <input class="form-control" type="file" name="nuevaImagen" placeholder="cambiar imagen">
                                           </div>
                                            <div class="input-group">
                                                <label>Titulo de la imagen</label>
                                                <input class="form-control" placeholder="Titulo de la imagen" name="tituloImagen" value="{{$imagenes->titulo}}">
                                            </div>
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

            @endforeach
            </div>
        </div>
    </div>

@stop

@section('script')
    {!! Html::script('js/dropzone.min.js'); !!}
    <script>
      Dropzone.options.myDropzone = {
            paramName: "file",
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 10,
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();

                });
                this.on("addedfile", function(file) {
                   // alert("file uploaded");
                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                    location.reload();
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection





