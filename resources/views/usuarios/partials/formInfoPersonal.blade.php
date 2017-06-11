<div class="box-body">

    <fieldset>
        {{--<legend>Información Personal</legend>--}}
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('nombre',$persona->nombre,['class' => 'form-control text-capitalize', 'placeholder'=>'Nombre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('nombre',$persona->nombre,['class' => 'form-control text-capitalize', 'placeholder'=>'Nombre', 'required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombre',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Nombre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('apellido', 'Apellido', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('apellido',$persona->apellido,['class' => 'form-control text-capitalize', 'placeholder'=>'Apellido', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('apellido',$persona->apellido,['class' => 'form-control text-capitalize', 'placeholder'=>'Apellido', 'required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('apellido',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Apellido', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('identificacion', 'Cedula', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit')
                            {{ Form::number('identificacion', $persona->identificacion,['class' => 'form-control', 'placeholder'=>'Cedula', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil' || $form == 'editarperfil')
                            {{ Form::number('identificacion', $persona->identificacion,['class' => 'form-control', 'placeholder'=>'Cedula', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::number('identificacion', '',['class' => 'form-control', 'placeholder'=>'Cedula', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('celular', 'Celular', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::number('celular', $persona->celular,['class' => 'form-control', 'placeholder'=>'Celular', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::number('celular', $persona->celular,['class' => 'form-control', 'placeholder'=>'Celular', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::number('celular', '',['class' => 'form-control', 'placeholder'=>'Celular', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('barrio', 'Barrio', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('barrio',$persona->barrio,['class' => 'form-control text-capitalize', 'placeholder'=>'Barrio', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('barrio',$persona->barrio,['class' => 'form-control text-capitalize', 'placeholder'=>'Barrio', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('barrio',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Barrio', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('direccion', 'Dirección', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('direccion',$persona->direccion,['class' => 'form-control text-capitalize', 'placeholder'=>'Direccion', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('direccion',$persona->direccion,['class' => 'form-control text-capitalize', 'placeholder'=>'Direccion', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('direccion',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Direccion', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('fechanacimiento', 'Fecha Nacimiento', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            <?php
                                $fnacimiento = null;
                                if($persona->fechanacimiento != '0000-00-00'){$fnacimiento = $persona->fechanacimiento;}
                            ?>
                            {{ Form::date('fechanacimiento', $fnacimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Fecha Nacimiento']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::date('fechanacimiento',$persona->fechanacimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Fecha Nacimiento', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::date('fechanacimiento',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Fecha Nacimiento', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('lugarnacimiento', 'Lugar Nacimiento', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('lugarnacimiento',$persona->lugarnacimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Lugar Nacimiento', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('lugarnacimiento',$persona->lugarnacimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Lugar Nacimiento', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('lugarnacimiento',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Lugar Nacimiento', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('telcasa', 'Telefono casa 1', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('telcasa',$persona->telcasa,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 1']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('telcasa',$persona->telcasa,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 1', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('telcasa',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 1']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('telcasa2', 'Telefono casa 2', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('telcasa2',$persona->telcasa2,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 2']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('telcasa2',$persona->telcasa2,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 2', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('telcasa2',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Telefono casa 2']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6 col-md-6'>
                <div class="form-group">
                    {{ Form::label('foto', 'Foto', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::file('foto') }}
                        @elseif($form == 'show')
                            <br><img src="{{ $persona->foto }}" class="user-image" alt="User Image"><br>
                        @elseif($form == 'perfil')
                            <br><img src="{{ $persona->foto }}" class="user-image" alt="User Image"><br>
                            {{ Form::open(['route' => ['eliminarfotoperfil'], 'method' => 'POST']) }}
                            <button type="submit" class="btn btn-primary btn-sm">Eliminar Foto</button>
                            {{ Form::close() }}
                        @endif
                    @else
                        {{ Form::file('foto') }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('emailadicional', 'Email Adicional', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($persona))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::email('emailadicional',$persona->emailadicional,['class' => 'form-control', 'placeholder'=>'Email Adicional']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::email('emailadicional',$persona->emailadicional,['class' => 'form-control', 'placeholder'=>'Email Adicional', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::email('emailadicional',null,['class' => 'form-control', 'placeholder'=>'Email Adicional', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
    </fieldset>

</div><!-- /.box-body -->