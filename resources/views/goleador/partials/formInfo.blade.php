<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('user_id', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($goleador))
                        @if($form == 'edit')
                            @if(isset($users) && is_array($users))
                                {{ Form::select('user_id', $users , $goleador->socio_id, ['placeholder' => 'Seleccione Nombre', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                        @endif
                    @else
                        @if(isset($users) && is_array($users))
                            {{ Form::select('user_id', $users , null, ['placeholder' => 'Seleccione Nombre', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
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
                    {{ Form::label('goles', 'Goles*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($goleador))
                        @if($form == 'edit')
                            {{ Form::text('goles',$goleador->goles,['class' => 'form-control', 'placeholder'=>'Goles', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('goles',null,['class' => 'form-control', 'placeholder'=>'Goles', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

        </div>

    </fieldset>

</div><!-- /.box-body -->

