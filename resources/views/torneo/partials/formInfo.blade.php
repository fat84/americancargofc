<div class="box-body">

    <fieldset>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($torneo))
                        @if($form == 'edit')
                            {{ Form::text('nombre',$torneo->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                        @endif
                    @else
                        {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('visible', 'Visible*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($torneo))
                        @if($form == 'edit')
                            {{ Form::select('visible', ['1'=>'Sí', '0'=>'No'] , $torneo->visible, ['class' => 'form-control']) }}
                        @endif
                    @else
                        {{ Form::select('visible', ['1'=>'Sí', '0'=>'No'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>

        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    @if(isset($form) && isset($torneo))
                        @if($form == 'edit')
                        {{ Form::label('fechaini', 'Fecha Inicio*', ['class' => 'control-label']) }}
                        {{ Form::date('fechaini', $torneo->fechaini, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @else
                        {{ Form::label('fechaini', 'Fecha Inicio*', ['class' => 'control-label']) }}
                        {{ Form::date('fechaini', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'=>'required'])}}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    @if(isset($form) && isset($torneo))
                        @if($form == 'edit')
                            {{ Form::label('fechafin', 'Fecha Fin*', ['class' => 'control-label']) }}
                            {{ Form::date('fechafin', $torneo->fechafin, ['class' => 'form-control', 'required'=>'required'])}}
                        @endif
                    @else
                        {{ Form::label('fechafin', 'Fecha Fin*', ['class' => 'control-label']) }}
                        {{ Form::date('fechafin', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'=>'required'])}}
                    @endif
                </div>
            </div>
        </div>

    </fieldset>

</div><!-- /.box-body -->