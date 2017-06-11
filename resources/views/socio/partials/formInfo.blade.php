<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($socio))
                        @if($form == 'edit')
                            {{ Form::text('nombre',$socio->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                        @elseif($form == 'show')
                            {{ Form::text('nombre',$socio->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('apellido', 'Apellido*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($socio))
                        @if($form == 'edit')
                            {{ Form::text('apellido',$socio->apellido,['class' => 'form-control', 'placeholder'=>'Apellido', 'required'=>'required']) }}
                        @elseif($form == 'show')
                            {{ Form::text('apellido',$socio->apellido,['class' => 'form-control', 'placeholder'=>'Apellido', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('apellido',null,['class' => 'form-control', 'placeholder'=>'Apellido', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('tipodocumento_id', 'Tipo Documento*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($socio))
                        @if($form == 'edit')
                            @if(isset($tiposidenticacion) && is_array($tiposidenticacion))
                                {{ Form::select('tipodocumento_id', $tiposidenticacion , $socio->tipodocumento_id, ['placeholder' => 'Seleccione Tipo', 'class' => 'form-control', 'required'=>'required']) }}
                            @endif
                        @elseif($form == 'show')
                            {{ Form::text('tipodocumento_id',$socio->tipoIdentificacion->nombre,['class' => 'form-control', 'placeholder'=>'Seleccione Tipo', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        @if(isset($tiposidenticacion) && is_array($tiposidenticacion))
                            {{ Form::select('tipodocumento_id', $tiposidenticacion , null, ['placeholder' => 'Seleccione Tipo', 'class' => 'form-control', 'required'=>'required']) }}
                        @endif
                    @endif
                </div>
            </div>

            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('identificacion', 'Numero Documento*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($socio))
                        @if($form == 'edit')
                            {{ Form::text('identificacion', $socio->identificacion,['class' => 'form-control', 'placeholder'=>'Numero Documento', 'required'=>'required']) }}
                        @elseif($form == 'show')
                            {{ Form::text('identificacion', $socio->identificacion,['class' => 'form-control', 'placeholder'=>'Numero Documento', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('identificacion', '',['class' => 'form-control', 'placeholder'=>'Numero Documento', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>

    </fieldset>

</div><!-- /.box-body -->

