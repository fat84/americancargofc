<div class="box-body">

    <fieldset>
        <div class="row">
            <div class='col-sm-12'>
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre*', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($informe))
                        @if($form == 'edit')
                            {{ Form::text('nombre',$informe->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                        @elseif($form == 'show')
                            {{ Form::text('nombre',$informe->nombre,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                    @endif
                </div>
            </div>
        </div>
    </fieldset>

</div><!-- /.box-body -->

