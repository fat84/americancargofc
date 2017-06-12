@extends('layouts.admin')
@section('pageheader')
    GALERIA
@stop
@section('content')
    @include('partials.mensajes')
    <div class="panel panel-default">
        {!! Form::open(['url' => 'crearGaleria', 'method' => 'post','files' => true]) !!}
            <div class="panel-heading">CREAR GALERIA <div class="pull-right">
                    <button type="submit" class="btn btn-success">Guardar Galeria</button>
                </div></div>
            <div class="panel-body">


                <div class="col-lg-6">
                    <div class="input-group">
                        <label for="">Nombre de la galeria*</label>
                        <input id="titulo" name="titulo" required class="form-control" placeholder="Titulo de la Galeria">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <label for="">Imagen principal*</label>
                        <input id="titulo" name="imagen" type="file" required class="form-control" placeholder="Titulo de la Galeria">
                    </div>
                </div>
                <br>


            </div>
        {!! Form::close() !!}
    </div>


            <div class="panel panel-default">
        <div class="panel-body">

            <table id="listaGaleria" class="display table" cellspacing="0" width="100%">
                <thead>
                <tr>

                    <th>Nombre</th>
                    <th>Imagen Principal</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tfoot>
                <tr>

                    <th>Nombre</th>
                    <th>Imagen Principal</th>
                    <th>Accion</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($galerias as $galerias)
                    <tr>
                        <td>{{$galerias->nombre}}</td>
                        <td><img style="max-width: 200px" src="{{asset('galeria/'.$galerias->archivo)}}"></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acción <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('galeria/individual/'.$galerias->id)}}">Agregar imagenes</a></li>
                                    <li><a href="#" onclick="alertEliminar{{$galerias->id}}()">Eliminar galeria</a></li>
                                    <form id="eliminarGaleria{{$galerias->id}}" action="{{url('eliminarGaleria/'.$galerias->id)}}" method="get">
                                    </form>
                                </ul>
                            </div></td>
                    </tr>

                    <script>
                        function alertEliminar{{$galerias->id}}() {
                            swal({
                                    title: "¿Esta seguro?",
                                    text: "Desea eliminar esta galeria",
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
                                        swal("Anulada!", "Galeria eliminada", "success");
                                        $('#eliminarGaleria{{$galerias->id}}').submit();

                                    } else {
                                        swal("Cancelado", "Ha sido cancelado :)", "error");
                                    }
                                });
                        }
                    </script>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#listaGaleria').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                }
            });

        });

        
    </script>
@stop