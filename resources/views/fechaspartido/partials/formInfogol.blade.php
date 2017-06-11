<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group" id="">
                    {{ Form::label('user_id', 'Nombre*', ['class' => 'control-label']) }}
                    <select name="user_id" id="listusers" class="form-control select2" required style="width: 100%;">

                    </select>
                </div>
            </div>

            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('equipo_id', 'Gol a equipo*', ['class' => 'control-label']) }}
                    <select name="equipo_id" id="listequipos" class="form-control select2" required style="width: 100%;">

                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('minuto', 'Minuto*', ['class' => 'control-label']) }}
                    {{ Form::number('minuto',null,['class' => 'form-control', 'placeholder'=>'Minuto', 'required'=>'required']) }}
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('autogol', 'Autogol*', ['class' => 'control-label']) }}<br>
                    {{ Form::checkbox('autogol','1') }}
                </div>
            </div>
        </div>

    </fieldset>

</div><!-- /.box-body -->

