<div class="box-body">
    <fieldset>
        {{--<legend>Información Inicio De Sesión</legend>--}}
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($user))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::email('email',$user->email,['class' => 'form-control', 'placeholder'=>'Email', 'required'=>'required']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::email('email',$user->email,['class' => 'form-control', 'placeholder'=>'Email', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::email('email',null,['class' => 'form-control', 'placeholder'=>'Email', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('rol_id', 'Rol', ['class' => 'control-label']) }}
                        @if(isset($form) && isset($user))
                            @if($form == 'edit')
                                @if(isset($roles) && is_array($roles))
                                {{ Form::select('rol_id', $roles , $user->rol_id, ['placeholder' => 'Seleccione Rol', 'class' => 'form-control', 'required'=>'required']) }}
                                @endif
                            @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                                {{ Form::text('rol_id',$user->rol->nombre,['class' => 'form-control', 'placeholder'=>'Rol', 'required'=>'required', 'readonly']) }}
                            @endif
                        @else
                            @if(isset($roles) && is_array($roles))
                                {{ Form::select('rol_id', $roles , '', ['placeholder' => 'Seleccione Rol', 'class' => 'form-control', 'required'=>'required']) }}
                            @endif
                        @endif
                </div>
            </div>
        </div>

    @if(isset($form))
        @if($form == 'editarperfil')
            <div class="row">
                <div class='col-sm-4'>
                    <div class="form-group">
                        {{ Form::label('passwordactual', 'Password Actual', ['class' => 'control-label']) }}
                        {{ Form::password('passwordactual', array('class' => 'form-control', 'placeholder' => 'Password Actual')) }}
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class="form-group">
                        {{ Form::label('password', 'Nueva Password', ['class' => 'control-label']) }}
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Nueva Password')) }}
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Repetir Nueva Password', ['class' => 'control-label']) }}
                        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Repetir Nueva Password')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-sm-12'>
                    <div class="form-group">
                        <p class="help-block">*Dejar En Blanco Los Campos Password Si No Desea Cambiar El Password.</p>
                    </div>
                </div>
            </div>
        @elseif($form == 'edit')
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        <p class="help-block">*Dejar En Blanco Los Campos Password Si No Desea Cambiar El Password.</p>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirmar Password', ['class' => 'control-label']) }}
                        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmar Password')) }}
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required'=>'required')) }}
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirmar Password', ['class' => 'control-label']) }}
                        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmar Password', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
    @endif


    </fieldset>

</div><!-- /.box-body -->