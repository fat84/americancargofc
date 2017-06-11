<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('socio_id', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($sociostroja))
                        @if($form == 'edit')
                            @if(isset($socios) && is_array($socios))
                                {{ Form::select('socio_id', $socios , $sociostroja->socio_id, ['placeholder' => 'Seleccione Nombre', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                        @endif
                    @else
                        @if(isset($socios) && is_array($socios))
                            {{ Form::select('socio_id', $socios , null, ['placeholder' => 'Seleccione Nombre', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('equipo_id', 'Equipo*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($goleador))
                        @if($form == 'edit')
                            @if(isset($equipos) && is_array($equipos))
                                {{ Form::select('equipo_id', $equipos , $goleador->equipo_id, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                        @endif
                    @else
                        @if(isset($equipos) && is_array($equipos))
                            {{ Form::select('equipo_id', $equipos , null, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-2'>
                <div class="form-group">
                    {{ Form::label('troja', 'Tarjetas Rojas*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($sociostroja))
                        @if($form == 'edit')
                            {{ Form::text('troja',$sociostroja->troja,['class' => 'form-control', 'placeholder'=>'Tarjetas Rojas', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('troja',null,['class' => 'form-control', 'placeholder'=>'Tarjetas Rojas', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

        </div>

    </fieldset>

</div><!-- /.box-body -->

