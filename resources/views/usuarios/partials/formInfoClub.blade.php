<div class="box-body">

    <fieldset>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('numerosocio', 'Numero Socio', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('numerosocio',$club->numerosocio,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Socio']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('numerosocio',$club->numerosocio,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Socio', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('numerosocio',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Socio']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('numerocamiseta', 'Numero Camiseta', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('numerocamiseta',$club->numerocamiseta,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Camiseta']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('numerocamiseta',$club->numerocamiseta,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Camiseta', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('numerocamiseta',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Numero Camiseta']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('nivel', 'Nivel', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('nivel', ['1A'=>'1A', '1B'=>'1B', '1C'=>'1C', '1D'=>'1D', '1E'=>'1E', '1Z'=>'1Z'] , $club->nivel, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('nivel',$club->nivel,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('nivel', ['1A'=>'1A', '1B'=>'1B', '1C'=>'1C', '1D'=>'1D', '1E'=>'1E', '1Z'=>'1Z'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('posicion', 'Posicion', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('posicion', ['Arquero'=>'Arquero', 'Defensa Central'=>'Defensa Central', 'Marcador'=>'Marcador', 'Volante De Marca'=>'Volante De Marca', 'Volante De Ataque'=>'Volante De Ataque', 'Delantero'=>'Delantero'] , $club->posicion, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('posicion',$club->posicion,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('posicion', ['Arquero'=>'Arquero', 'Defensa Central'=>'Defensa Central', 'Marcador'=>'Marcador', 'Volante De Marca'=>'Volante De Marca', 'Volante De Ataque'=>'Volante De Ataque', 'Delantero'=>'Delantero'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('lesionado', 'Lesionado', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('lesionado', ['0'=>'No', '1'=>'Sí'] , $club->lesionado, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('lesionado',$club->lesionado,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('lesionado', ['0'=>'No', '1'=>'Sí'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('standby', 'Stand By', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('standby', ['0'=>'No', '1'=>'Sí'] , $club->standby, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('standby',$club->standby,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('standby', ['0'=>'No', '1'=>'Sí'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('standby_desde', 'Standby Desde', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            <?php
                            $fdesde = null;
                            if($persona->standby_desde != '0000-00-00'){$fdesde = $persona->standby_desde;}
                            ?>
                            {{ Form::date('standby_desde',$fdesde,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Desde']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::date('standby_desde',$club->standby_desde,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Desde', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::date('standby_desde',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Desde']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('standby_hasta', 'Standby Hasta', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            <?php
                            $fhasta = null;
                            if($persona->standby_hasta != '0000-00-00'){$fhasta = $persona->standby_hasta;}
                            ?>
                            {{ Form::date('standby_hasta',$fhasta,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Hasta']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::date('standby_hasta',$persona->standby_hasta,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Hasta', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::date('standby_hasta',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Standby Hasta']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('cuotasostenimiento', 'Cuota Sostenimiento', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('cuotasostenimiento',$club->cuotasostenimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Cuota Sostenimiento']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('cuotasostenimiento',$club->cuotasostenimiento,['class' => 'form-control text-capitalize', 'placeholder'=>'Cuota Sostenimiento', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('cuotasostenimiento',null,['class' => 'form-control text-capitalize', 'placeholder'=>'Cuota Sostenimiento']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('tallacamiseta', 'Talla Camiseta', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('tallacamiseta', ['S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL'] , $club->tallacamiseta, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('tallacamiseta',$club->tallacamiseta,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('tallacamiseta', ['S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('tallapantaloneta', 'Talla Pantaloneta', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('tallapantaloneta', ['S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL'] , $club->tallapantaloneta, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('tallapantaloneta',$club->tallapantaloneta,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('tallapantaloneta', ['S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('numcalzado', 'Numero Calzado', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('numcalzado', ['35'=>'35', '36'=>'36', '37'=>'37', '38'=>'38', '39'=>'39', '40'=>'40', '41'=>'41', '42'=>'42', '43'=>'43', '44'=>'44'] , $club->numcalzado, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('numcalzado',$club->numcalzado,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('numcalzado', ['35'=>'35', '36'=>'36', '37'=>'37', '38'=>'38', '39'=>'39', '40'=>'40', '41'=>'41', '42'=>'42', '43'=>'43', '44'=>'44'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('observaciones', 'Observaciones', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('observaciones',$club->observaciones,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Observaciones']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('observaciones',$club->observaciones,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Observaciones', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('observaciones',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Observaciones']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('tiposocio', 'Tipo Socio', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('tiposocio', ['Fundador'=>'Fundador', 'Gregario'=>'Gregario'] , $club->tiposocio, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('tiposocio',$club->tiposocio,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('tiposocio', ['Fundador'=>'Fundador', 'Gregario'=>'Gregario'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('categoria', 'Categoria', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('categoria', ['Veteranos'=>'Veteranos'] , $club->categoria, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('categoria',$club->categoria,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('categoria', ['Veteranos'=>'Veteranos'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('lesion', 'Lesion', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit' || $form == 'editarperfil')
                            {{ Form::text('lesion',$club->lesion,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Lesion']) }}
                        @elseif($form == 'show' || $form == 'perfil')
                            {{ Form::text('lesion',$club->lesion,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Lesion', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::text('lesion',null,['class' => 'form-control text-capitalize', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();', 'placeholder'=>'Lesion']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('activo', 'Activo', ['class' => 'control-label']) }}
                    @if(isset($form) && isset($club))
                        @if($form == 'edit')
                            {{ Form::select('activo', ['1'=>'Sí', '0'=>'No'] , $club->activo, ['class' => 'form-control']) }}
                        @elseif($form == 'show' || $form == 'perfil'|| $form == 'editarperfil')
                            {{ Form::text('activo',$club->activo,['class' => 'form-control', 'readonly']) }}
                        @endif
                    @else
                        {{ Form::select('activo', ['1'=>'Sí', '0'=>'No'] , '', ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        </div>




    </fieldset>

</div><!-- /.box-body -->