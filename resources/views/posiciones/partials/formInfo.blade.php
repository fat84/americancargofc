<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    {{ Form::label('equipo_id', 'Equipo*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            @if(isset($equipos) && is_array($equipos))
                                {{ Form::select('equipo_id', $equipos , $posicion->equipo_id, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                            @endif
                        @endif
                    @else
                        @if(isset($equipos) && is_array($equipos))
                            {{ Form::select('equipo_id', $equipos , null, ['placeholder' => 'Seleccione Equipo', 'class' => 'form-control select2', 'required'=>'required','style'=>'width: 100%;']) }}
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('pj', 'PJ*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('pj',$fecha->pj,['class' => 'form-control', 'placeholder'=>'PJ', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('pj',null,['class' => 'form-control', 'placeholder'=>'PJ', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('pg', 'PG*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('pg',$fecha->pg,['class' => 'form-control', 'placeholder'=>'PG', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('pg',null,['class' => 'form-control', 'placeholder'=>'PG', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('pe', 'PE*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('pe',$fecha->pe,['class' => 'form-control', 'placeholder'=>'PE', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('pe',null,['class' => 'form-control', 'placeholder'=>'PE', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('pp', 'PP*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('pp',$fecha->pp,['class' => 'form-control', 'placeholder'=>'PP', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('pp',null,['class' => 'form-control', 'placeholder'=>'PP', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('gf', 'GF*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('gf',$fecha->gf,['class' => 'form-control', 'placeholder'=>'GF', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('gf',null,['class' => 'form-control', 'placeholder'=>'GF', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('gc', 'GC*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('gc',$fecha->gc,['class' => 'form-control', 'placeholder'=>'GC', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('gc',null,['class' => 'form-control', 'placeholder'=>'GC', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('dg', 'DG*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('dg',$fecha->dg,['class' => 'form-control', 'placeholder'=>'DG', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('dg',null,['class' => 'form-control', 'placeholder'=>'DG', 'required'=>'required']) }}
                    @endif
                </div>
            </div>

            <div class='col-sm-1'>
                <div class="form-group">
                    {{ Form::label('pts', 'PTS*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($posicion))
                        @if($form == 'edit')
                            {{ Form::text('pts',$fecha->pts,['class' => 'form-control', 'placeholder'=>'PTS', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('pts',null,['class' => 'form-control', 'placeholder'=>'PTS', 'required'=>'required']) }}
                    @endif
                </div>
            </div>




        </div>

    </fieldset>

</div><!-- /.box-body -->

