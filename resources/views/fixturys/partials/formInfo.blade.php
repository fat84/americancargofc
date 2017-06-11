<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-12'>
                <div class="form-group">

                    @if(isset($form) && isset($ponencia))
                        @if($form == 'edit')
                            {{ Form::label('archivo', 'Archivo Pdf*', ['class' => 'control-label']) }}
                            {{ Form::file('archivo') }}
                        @endif
                    @else
                        {{ Form::label('archivo', 'Archivo Pdf*', ['class' => 'control-label']) }}
                        {{ Form::file('archivo') }}
                    @endif
                </div>
            </div>

        </div>

    </fieldset>

</div><!-- /.box-body -->

