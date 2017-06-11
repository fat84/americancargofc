<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    @if(isset($form) && isset($fecha))
                        @if($form == 'edit')
                            {{ Form::label('fecha', 'Fecha Partido*', ['class' => 'control-label']) }}
                            {{ Form::date('fecha', $fecha->fecha, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('lugar', 'Lugar*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($user))
                        @if($form == 'edit')
                            @if(isset($escenarios) && is_array($escenarios))
                                {{ Form::select('escenario_id', $escenarios , $escenarios->escenario_id, ['placeholder' => 'Seleccione Lugar', 'class' => 'form-control', 'required'=>'required']) }}
                            @endif
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    <?php
                    $horas = config('arrays.horapartido');
                    ?>
                    {{ Form::label('hora', 'Hora*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($fechapartido))
                        @if($form == 'edit')
                            @if(isset($horas) && is_array($horas))
                                {{ Form::select('hora', $horas , $fechapartido->hora, ['placeholder' => 'Seleccione Hora', 'class' => 'form-control', 'required'=>'required']) }}
                            @endif
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    <?php
                    $estados = config('arrays.estadopartido');
                    ?>
                    {{ Form::label('estado', 'Estado*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($fechapartido))
                        @if($form == 'edit')
                            {{ Form::select('estado', $estados , $fechapartido->estado, ['placeholder' => 'Seleccione Estado', 'class' => 'form-control', 'required'=>'required']) }}
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('equipouno', 'Primer Equipo*', ['class' => 'control-label']) }}<br>
                    @if(isset($form) && isset($fecha))
                        @if($form == 'edit')
                            @if(isset($equipos) && is_array($equipos))
                                {{ Form::select('equipouno', $equipos , $fecha->equipouno, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('equipodos', 'Segundo Equipo*', ['class' => 'control-label']) }}<br>
                    @if(isset($form) && isset($fecha))
                        @if($form == 'edit')
                            @if(isset($equipos) && is_array($equipos))
                                {{ Form::select('equipodos', $equipos , $fecha->equipodos, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                       @endif
                    @endif
                </div>
            </div>


        </div>

    </fieldset>

</div><!-- /.box-body -->

