@extends('layouts.admin')

@section('style')
    {{ Html::style('plugins/iCheck/all.css') }}
@stop

@section('pageheader')
    PRIVILEGIOS ROL
@stop

@section('content')

    @if(isset($rol))
        <div class="box-body row">
            <h4><strong>Privilegios Del Rol:</strong> {{$rol->nombre}}</h4>
        </div>
    @endif

    @if(isset($allprivilegios) && isset($rolprivilegios) && isset($rol))
        <div class="box">
            {{ Form::open(['route' => ['defaultupdateprivilegios', $rol->id], 'method' => 'POST']) }}
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Privilegio</th>
                            <th class="text-center">Consultar</th>
                            <th class="text-center">Crear</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allprivilegios as $privilegio)

                        <?php $crear=0; $editar=0; $eliminar=0; $consultar=0;
                            foreach($rolprivilegios as $rolpri) {
                                if($rolpri->privilegio_id == $privilegio->id){
                                    $crear = $rolpri->crear;
                                    $editar = $rolpri->editar;
                                    $eliminar = $rolpri->eliminar;
                                    $consultar = $rolpri->consultar;
                                }
                            }
                        ?>
                        <tr>
                            <td class="text-center">{{ $privilegio->descripcion }}</td>
                            <td class="text-center">
                                {{ Form::checkbox($privilegio->id.'consultar',1, $consultar) }}
                            </td>
                            <td class="text-center">
                                {{ Form::checkbox($privilegio->id.'crear',1, $crear) }}
                            </td>
                            <td class="text-center">
                                {{ Form::checkbox($privilegio->id.'editar',1, $editar) }}
                            </td>
                            <td class="text-center">
                                {{ Form::checkbox($privilegio->id.'eliminar',1, $eliminar) }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
            </div>
            {{ Form::close() }}
        </div>
    @endif

@stop

@section('script')
    <script src="plugins/iCheck/icheck.min.js"></script>

    <script>
        $(function () {
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });
    </script>

@stop
