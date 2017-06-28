@extends('layouts.admin')
@section('pageheader')
    EVENTOS
@stop
@section('content')
    @include('partials.mensajes')

    <div class="box-body row">
        <div class="col-md-12">
            <a href="{{url('eventos/nuevo')}}" class="btn btn-success pull-right">Crear nuevo evento</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="listaGaleria" class="display table" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>Nombre</th>
                            <th>Fecha</th>
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
                        @foreach($eventos as $evento)
                            <tr>
                                <td>{{$evento->nombre}}</td>
                                <td>{{$evento->fecha}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acción <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('galeria/individual/'.$evento->id)}}">Ver</a></li>
                                            <li><a href="{{url('galeria/individual/'.$evento->id)}}">Editar</a></li>
                                            <li><a href="#" onclick="alertEliminar{{$evento->id}}()">Elimianr</a></li>
                                            <form id="eliminarGaleria{{$evento->id}}" action="{{url('eventos/eliminar/'.$evento->id)}}" method="get">
                                            </form>
                                        </ul>
                                    </div></td>
                            </tr>

                            <script>
                                function alertEliminar{{$evento->id}}() {
                                    swal({
                                            title: "¿Esta seguro?",
                                            text: "Desea eliminar este evneto",
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
                                                swal("Anulada!", "Evento eliminado", "success");
                                                $('#eliminarGaleria{{$evento->id}}').submit();

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
        </div>
    </div>

@stop

@section('script')

@endsection