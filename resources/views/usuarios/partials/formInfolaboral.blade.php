<div class="box-body">

    <fieldset>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('profesion', 'Profesión', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('profesion',$laboral->profesion,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesión']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('profesion',$laboral->profesion,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesión', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('profesion',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesión']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('gradoescolar', 'Grado Escolar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('gradoescolar',$laboral->gradoescolar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Grado Escolar']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('gradoescolar',$laboral->gradoescolar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Grado Escolar', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('gradoescolar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Grado Escolar']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('titulo', 'Titulo', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('titulo',$laboral->titulo,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Titulo']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('titulo',$laboral->titulo,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Titulo', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('titulo',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Titulo']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('empresa', 'Nombre empresa labora', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('empresa',$laboral->empresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre empresa labora']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('empresa',$laboral->empresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre empresa labora', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('empresa',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre empresa labora']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('direccionempresa', 'Dirección empresa labora', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('direccionempresa',$laboral->direccionempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Dirección empresa labora']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('direccionempresa',$laboral->direccionempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Dirección empresa labora', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('direccionempresa',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Dirección empresa labora']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('telefonoempresa', 'Teléfono empresa', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('telefonoempresa',$laboral->telefonoempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Teléfono empresa']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('telefonoempresa',$laboral->telefonoempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Teléfono empresa', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('telefonoempresa',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Teléfono empresa']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('celularempresa', 'Celular empresa', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($laboral))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('celularempresa',$laboral->celularempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Celular empresa']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('celularempresa',$laboral->celularempresa,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Celular empresa', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('celularempresa',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Celular empresa']) }}
                    @endif
                </div>
            </div>
        </div>

    </fieldset>

</div><!-- /.box-body -->