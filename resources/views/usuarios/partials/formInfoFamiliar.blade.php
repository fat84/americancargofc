<div class="box-body">

    <fieldset>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombrepadre', 'Nombre Padre', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('nombrepadre',$familiar->nombrepadre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Padre']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('nombrepadre',$familiar->nombrepadre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Padre', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombrepadre',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Padre']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombremadre', 'Nombre Madre', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('nombremadre',$familiar->nombremadre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Madre']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('nombremadre',$familiar->nombremadre,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Madre', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombremadre',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Madre']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('rolfamiliar', 'Rol Familiar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('rolfamiliar',$familiar->rolfamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Madre, Esposa o Conyugue']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('rolfamiliar',$familiar->rolfamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Madre, Esposa o Conyugue', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('rolfamiliar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Madre, Esposa o Conyugue']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombrefamiliar', 'Nombre Familiar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('nombrefamiliar',$familiar->nombrefamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Familiar']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('nombrefamiliar',$familiar->nombrefamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Familiar', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombrefamiliar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Nombre Familiar']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('profesionfamiliar', 'Profesion Familiar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('profesionfamiliar',$familiar->profesionfamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesion Familiar']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('profesionfamiliar',$familiar->profesionfamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesion Familiar', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('profesionfamiliar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Profesion Familiar']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('empresalaborafamiliar', 'Empresa Familiar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('empresalaborafamiliar',$familiar->empresalaborafamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Empresa Trabajo Del Familiar']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('empresalaborafamiliar',$familiar->empresalaborafamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Empresa Trabajo Del Familiar', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('empresalaborafamiliar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Empresa Trabajo Del Familiar']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('telefonofamiliar', 'Telefono Familiar', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('telefonofamiliar',$familiar->telefonofamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Telefono Familiar']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('telefonofamiliar',$familiar->telefonofamiliar,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Telefono Familiar', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('telefonofamiliar',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Telefono Familiar']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('contactoemergencia', 'Contacto Emergencia', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('contactoemergencia',$familiar->contactoemergencia,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Contacto Emergencia']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('contactoemergencia',$familiar->contactoemergencia,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Contacto Emergencia', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('contactoemergencia',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Contacto Emergencia']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('numhijos', 'Numero Hijos', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($familiar))
                        @if($form == 'edit')
                            {{ Form::number('numhijos', $familiar->numhijos,['class' => 'form-control', 'placeholder'=>'Numero Hijos']) }}
                        @elseif($form == 'show' || $form == 'perfil' || $form == 'editarperfil')
                            {{ Form::number('numhijos', $familiar->numhijos,['class' => 'form-control', 'placeholder'=>'Numero Hijos', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::number('numhijos', '',['class' => 'form-control', 'placeholder'=>'Numero Hijos']) }}
                    @endif
                </div>
            </div>
        </div>


    </fieldset>

</div><!-- /.box-body -->