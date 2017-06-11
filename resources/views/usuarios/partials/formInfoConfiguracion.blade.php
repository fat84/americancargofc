<fieldset>
    <legend>Configuración</legend>
    <div class="row">
        @if($form != 'perfil' && $form != 'editarperfil')
        <div class='col-sm-4'>
            <div class="form-group">
                {{ Form::label('activo', 'Usuario Activo', ['class' => 'control-label']) }}
                <div class="make-switch switch-small">
                    @if(isset($user))
                        @if($form == 'edit')
                            {{ Form::checkbox('activo','1', $user->activo, ['data-on-text' => 'SI', 'data-off-text' => 'NO']) }}
                        @elseif($form == 'show')
                            @if($user->activo==1)
                                <span class="label label-success">Activo</span>
                            @else
                                <span class="label label-danger">Inactivo</span>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class='col-sm-4'>
            <div class="form-group">

                @if(isset($user))
                    <div class="make-switch switch-small">
                        @if(isset($user))
                            @if($form == 'edit')
                                {{ Form::label('segdoblepaso', 'Seguridad Doble Paso', ['class' => 'control-label']) }}
                                {{ Form::checkbox('segdoblepaso','1', $user->segdoblepaso, ['data-on-text' => 'SI', 'data-off-text' => 'NO']) }}
                            @elseif($form == 'show')
                                {{ Form::label('segdoblepaso', 'Seguridad Doble Paso', ['class' => 'control-label']) }}
                                @if($user->segdoblepaso==1)
                                    <span class="label label-success">Activo</span>
                                @else
                                    <span class="label label-danger">Inactivo</span>
                                @endif
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class='col-sm-4'>
            <div class="form-group">

                @if(isset($user))
                    <div class="make-switch switch-small">
                        @if(isset($user))
                            @if($form == 'edit')
                                {{ Form::label('alertsesion', 'Alerta Inicio De Sesión', ['class' => 'control-label']) }}
                                {{ Form::checkbox('alertsesion','1', $user->alertsesion, ['data-on-text' => 'SI', 'data-off-text' => 'NO']) }}
                            @elseif($form == 'show')
                                {{ Form::label('alertsesion', 'Alerta Inicio De Sesión', ['class' => 'control-label']) }}
                                @if($user->alertsesion==1)
                                    <span class="label label-success">Activo</span>
                                @else
                                    <span class="label label-danger">Inactivo</span>
                                @endif
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>

        @if($form == 'perfil')
        <div class='col-sm-4'>
            <div class="form-group">
                <div class=""><br>
                    {{ Form::open(['route' => ['editarperfil'], 'method' => 'POST']) }}
                    <button type="submit" class="btn btn-info pull-right">
                        <i class="glyphicon glyphicon-edit"></i> Editar Información
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endif

    </div>
</fieldset>