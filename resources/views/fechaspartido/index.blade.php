@extends('layouts.submenu')

@section('style')
    {{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('infotorneo')

    @include('partials.mensajes')

    <div class="box-body row">

        <div class="">
            <?php foreach(session('allprivilegios') as $privilegio) {
                if($privilegio->privilegio_id == 6 && $privilegio->crear == 1) { ?>
                <button type="button" class="btn btn-success  pull-right" data-toggle="modal" data-target="#myModalRegistro">
                    Nueva Fecha
                </button>

                <?php break;
                    }
                }
            ?>
        </div>

    </div>

    <div class="box container">
        <div class="box-header">

        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>LUGAR</th>
                        <th>HORA</th>
                        <th>EQUIPO 1</th>
                        <th>GOLES</th>
                        <th>EQUIPO 2</th>
                        <th>GOLES</th>
                        {{--<th>ESTADO</th>--}}
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fechas as $fecha)
                        <tr>
                            <td class="text-capitalize" >{{ \Carbon\Carbon::parse($fecha->fecha)->format('d-m-Y') }}</td>
                            <td class="text-capitalize" >{{ $fecha->escenario->nombre }}</td>
                            <td class="text-capitalize" >{{ $fecha->hora }}</td>
                            <td class="text-capitalize" >{{ $fecha->equipoUno->nombre }}</td>
                            {{--@if($fecha->estado == 'Por Jugar')
                                <td class="text-capitalize" > -- </td>
                            @else
                                <td class="text-capitalize" >{{ $fecha->golesuno }}</td>
                            @endif--}}
                            <td class="text-capitalize" >{{ $fecha->golesuno }}</td>
                            <td class="text-capitalize" >{{ $fecha->equipoDos->nombre }}</td>
                            {{--@if($fecha->estado == 'Por Jugar')
                                <td class="text-capitalize" > -- </td>
                            @else
                                <td class="text-capitalize" >{{ $fecha->golesdos }}</td>
                            @endif--}}
                            <td class="text-capitalize" >{{ $fecha->golesdos }}</td>
                            {{--<td class="text-capitalize" >{{ $fecha->estado }}</td>--}}

                            <td>

                                <?php $fechaactual = \Carbon\Carbon::now()->format('Y-m-d') ?>

                                @if($fecha->fecha == $fechaactual)
                                    <div class="dropdown">
                                        <button id="acciones" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Acción
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="acciones">
                                            <li><a href="#" onclick="modalGol({{ $fecha->id }})">Gol</a></li>
                                            <li><a href="#" onclick="modalTAmarilla({{ $fecha->id }})">T. Amarilla</a></li>
                                            <li><a href="#" onclick="modalTRoja({{ $fecha->id }})">T. Roja</a></li>
                                            <li class="divider"></li>

                                            @foreach(session('allprivilegios') as $privilegio)
                                                @if($privilegio->privilegio_id == 6 && $privilegio->editar == 1)
                                                    {{--<li><a href="#" onclick="modalGol({{ $fecha->id }})">Editar</a></li>--}}
                                                @endif
                                                @if($privilegio->privilegio_id == 6 && $privilegio->eliminar == 1)
                                                    <li><a href="#" onclick="validar('{{url('deletefechapartido'.$fecha->id)}}', '¿Esta seguro de eliminar?')">Eliminar</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    @if(Auth::user()->rol_id == 1)
                                        <div class="dropdown">
                                            <button id="acciones" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Acción
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="acciones">
                                                <li><a href="#" onclick="modalGol({{ $fecha->id }})">Gol</a></li>
                                                <li><a href="#" onclick="modalTAmarilla({{ $fecha->id }})">T. Amarilla</a></li>
                                                <li><a href="#" onclick="modalTRoja({{ $fecha->id }})">T. Roja</a></li>
                                                <li class="divider"></li>

                                                @foreach(session('allprivilegios') as $privilegio)
                                                    @if($privilegio->privilegio_id == 6 && $privilegio->editar == 1)
                                                        {{--<li><a href="#">Editar</a></li>--}}
                                                    @endif
                                                    @if($privilegio->privilegio_id == 6 && $privilegio->eliminar == 1)
                                                        <li><a href="#" onclick="validar('{{url('deletefechapartido'.$fecha->id)}}', '¿Esta seguro de eliminar?')">Eliminar</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {{ $fechas->appends(Request::only([]))->render() }}
            </div>
        </div>
    </div>

    <!-- Modal formulario de registro fecha partido -->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Nueva Fecha</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storefechaequipo'], 'method' => 'POST']) }}

                            @include('fechaspartido.partials.formInfo')

                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                            </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal formulario de edicion fecha partido -->
    <div class="modal fade" id="myModalEditarFecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Editar Fecha Partido</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['updatefechaequipo'], 'method' => 'POST']) }}

                        @include('fechaspartido.partials.formInfo')

                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal formulario de registro gol -->
    <div class="modal fade" id="myModalGol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Registro Gol</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storegoleador'], 'method' => 'POST']) }}
                        {{ Form::hidden('fechapartido_id',null, ['id'=>'fechapartido_id']) }}

                        @include('fechaspartido.partials.formInfogol')

                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                        </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal formulario de registro Tarjeta Amarilla -->
    <div class="modal fade" id="myModalTAmarilla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Registro Tarjeta Amarilla</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storetamarilla'], 'method' => 'POST']) }}
                        {{ Form::hidden('fechapartido_id',null, ['id'=>'fechapartidota']) }}

                        @include('fechaspartido.partials.formInfotamarilla')

                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                        </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal formulario de registro Tarjeta Roja -->
    <div class="modal fade" id="myModalTRoja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Registro Tarjeta Roja</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        {{ Form::open(['route' => ['storetroja'], 'method' => 'POST']) }}
                        {{ Form::hidden('fechapartido_id',null, ['id'=>'fechapartidotr']) }}

                        @include('fechaspartido.partials.formInfotroja')

                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                        </div>

                        {{ Form::close() }}
                    </div><!-- /.box -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('script')
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Torneo')").parent().addClass('active');
            $("#siderbarsubmenu a:contains('Fechas Partido')").parent().addClass('active');
        });
    </script>

    <script src="plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
            $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        });

    </script>

    <script>
        jQuery.fn.hasHScrollBar = function(){
            return this.get(0).scrollWidth > this.innerWidth();
        }

        $('.table-responsive .dropdown').on('show.bs.dropdown', function (e) {
            var $table = $(this).closest('.table-responsive');
            if(!$table.hasHScrollBar()){
                $('.table-responsive').css("overflow", "visible");
            }
        });

        $('.table-responsive .dropdown').on('shown.bs.dropdown', function (e) {
            var $table = $(this).closest('.table-responsive');

            if($table.hasHScrollBar()){
                var $menu = $(this).find('.dropdown-menu'),
                    tableOffsetHeight = $table.offset().top + $table.height(),
                    menuOffsetHeight = $menu.offset().top + $menu.outerHeight(true);

                if (menuOffsetHeight > tableOffsetHeight)
                    $table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight + 15);
            }

        });

        $('.table-responsive .dropdown').on('hide.bs.dropdown', function () {
            $(this).closest('.table-responsive').css({"padding-bottom":"", "overflow":""});
        })
    </script>

    <script>
        function modalGol(fechapartido) {
            var parametros = {
                fechapartido: fechapartido,
            };
            var ruta = '{{ url('golfechapartido') }}';
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type: 'POST',
                dataType: 'json',
                data: parametros,
                success: function (data) {

                    $('#fechapartido_id').val(fechapartido);

                    var users = data.users;
                    var optionusers = "<option value=''>Seleccione Jugador</option>";

                    for (i=0;i<users.length;i++){
                        optionusers += "<option value='"+users[i]['id']+"'>"+users[i]['nombre'] +' '+ users[i]['apellido'] +"</option>";
                    }

                    var equipos = data.equipos;
                    var optionequipos = "<option value=''>Seleccione Equipo</option>";

                    for (i=0;i<equipos.length;i++){
                        optionequipos += "<option value='"+equipos[i]['id']+"'>"+equipos[i]['nombre']+"</option>";
                    }

                    $('#listusers').html(optionusers);
                    $('#listequipos').html(optionequipos);

                    $('#myModalGol').modal('show');
                }
            });

        }

        function modalTAmarilla(fechapartido) {
            var parametros = {
                fechapartido: fechapartido,
            };
            var ruta = '{{ url('tamarillafechapartido') }}';
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type: 'POST',
                dataType: 'json',
                data: parametros,
                success: function (data) {

                    $('#fechapartidota').val(fechapartido);

                    var users = data.users;
                    var optionusers = "<option value=''>Seleccione Jugador</option>";

                    for (i=0;i<users.length;i++){
                        optionusers += "<option value='"+users[i]['id']+"'>"+users[i]['nombre'] +' '+ users[i]['apellido'] +"</option>";
                    }

                    $('#listusersta').html(optionusers);

                    $('#myModalTAmarilla').modal('show');
                }
            });

        }

        function modalTRoja(fechapartido) {
            var parametros = {
                fechapartido: fechapartido,
            };
            var ruta = '{{ url('trojafechapartido') }}';
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type: 'POST',
                dataType: 'json',
                data: parametros,
                success: function (data) {

                    $('#fechapartidotr').val(fechapartido);

                    var users = data.users;
                    var optionusers = "<option value=''>Seleccione Jugador</option>";

                    for (i=0;i<users.length;i++){
                        optionusers += "<option value='"+users[i]['id']+"'>"+users[i]['nombre'] +' '+ users[i]['apellido'] +"</option>";
                    }

                    $('#listuserstr').html(optionusers);

                    $('#myModalTRoja').modal('show');
                }
            });

        }

        function modalEditarFecha(fechapartido) {
            var parametros = {
                fechapartido: fechapartido,
            };
            var ruta = '{{ url('golfechapartido') }}';
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type: 'POST',
                dataType: 'json',
                data: parametros,
                success: function (data) {

                    $('#fechapartido_id').val(fechapartido);

                    var users = data.users;
                    var optionusers = "<option value=''>Seleccione Jugador</option>";

                    for (i=0;i<users.length;i++){
                        optionusers += "<option value='"+users[i]['id']+"'>"+users[i]['nombre'] +' '+ users[i]['apellido'] +"</option>";
                    }

                    var equipos = data.equipos;
                    var optionequipos = "<option value=''>Seleccione Equipo</option>";

                    for (i=0;i<equipos.length;i++){
                        optionequipos += "<option value='"+equipos[i]['id']+"'>"+equipos[i]['nombre']+"</option>";
                    }

                    $('#listusers').html(optionusers);
                    $('#listequipos').html(optionequipos);

                    $('#myModalGol').modal('show');
                }
            });

        }

    </script>

@stop