<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('socio_id', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            @if(isset($socios) && is_array($socios))
                                {{ Form::select('socio_id', $socios , $sociosancion->socio_id, ['placeholder' => 'Seleccione Nombre', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
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

            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('infraccion', 'Infraccion*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            {{ Form::text('infraccion',$sociosancion->infraccion,['class' => 'form-control', 'placeholder'=>'Infraccion', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('infraccion',null,['class' => 'form-control', 'placeholder'=>'Infraccion', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            {{ Form::label('fecha', 'Fecha*', ['class' => 'control-label']) }}
                            {{ Form::date('fecha', $sociosancion->fecha, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @else
                        {{ Form::label('fecha', 'Fecha*', ['class' => 'control-label']) }}
                        {{ Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'=>'required'])}}
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('canfechas', 'Cant Fechas*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            {{ Form::text('canfechas',$sociosancion->canfechas,['class' => 'form-control', 'placeholder'=>'Cant Fechas', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('canfechas',null,['class' => 'form-control', 'placeholder'=>'Cant Fechas', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            {{ Form::label('desde', 'Desde*', ['class' => 'control-label']) }}
                            {{ Form::date('desde', $sociosancion->desde, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @else
                        {{ Form::label('desde', 'Desde*', ['class' => 'control-label']) }}
                        {{ Form::date('desde', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'=>'required'])}}
                    @endif
                </div>
            </div>

            <div class='col-sm-4'>
                <div class="form-group">
                    @if(isset($form) && isset($sociosancion))
                        @if($form == 'edit')
                            {{ Form::label('hasta', 'Hasta*', ['class' => 'control-label']) }}
                            {{ Form::date('hasta', $sociosancion->hasta, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @else
                        {{ Form::label('hasta', 'Hasta*', ['class' => 'control-label']) }}
                        {{ Form::date('hasta', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'=>'required'])}}
                    @endif
                </div>
            </div>

        </div>

    </fieldset>

</div><!-- /.box-body -->

