<div class="box-body">

    <fieldset>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('estatura', 'Estatura', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('estatura',$salud->estatura,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estatura']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('estatura',$salud->estatura,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estatura', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('estatura',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estatura']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('peso', 'Peso', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('peso',$salud->peso,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Peso']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('peso',$salud->peso,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Peso', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('peso',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Peso']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('imc', 'Indice Masa Corporal', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('imc',$salud->imc,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Indice Masa Corporal']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('imc',$salud->imc,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Indice Masa Corporal', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('imc',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Indice Masa Corporal']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('estadoimc', 'Estado IMC', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('estadoimc',$salud->estadoimc,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estado IMC']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('estadoimc',$salud->estadoimc,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estado IMC', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('estadoimc',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Estado IMC']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('entidadsalud', 'Entidad Salud', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('entidadsalud',$salud->entidadsalud,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Entidad Salud']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('entidadsalud',$salud->entidadsalud,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Entidad Salud', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('entidadsalud',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Entidad Salud']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('riesgosprofesionales', 'Riesgos Profesionales', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('riesgosprofesionales',$salud->riesgosprofesionales,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Riesgos Profesionales']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('riesgosprofesionales',$salud->riesgosprofesionales,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Riesgos Profesionales', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('riesgosprofesionales',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Riesgos Profesionales']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('tiposangre', 'Tipo Sangre', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('tiposangre',$salud->tiposangre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Tipo Sangre']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('tiposangre',$salud->tiposangre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Tipo Sangre', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('tiposangre',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Tipo Sangre']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('alergias', 'Alergias sufridas', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('alergias',$salud->alergias,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Alergias sufridas']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('alergias',$salud->alergias,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Alergias sufridas', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('alergias',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Alergias sufridas']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('fracturas', 'Fracturas', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($salud))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('fracturas',$salud->fracturas,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Fracturas']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('fracturas',$salud->fracturas,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Fracturas', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('fracturas',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Fracturas']) }}
                    @endif
                </div>
            </div>
        </div>


    </fieldset>

</div><!-- /.box-body -->