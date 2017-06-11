@extends('layouts.index')

@section('contenido')

    <div class="contact">
	 <div class="container">
		 <div class="contact-grids">
             @include('partials.mensajes')

             <h2>EXCUSAS</h2>
             <br>


		 </div>

         {{ Form::open(['route' => ['emailexcusas'], 'method' => 'POST']) }}

         <div class="row">
             <div class='col-sm-6'>
                 <div class="form-group">
                     {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre', 'required'=>'required']) }}
                 </div>
             </div>
             <div class='col-sm-6'>
                 <div class="form-group">
                     {{ Form::select('dia', ['Lunes' => 'Lunes', 'Jueves' => 'Jueves', 'Sabado' => 'Sabado'] , null, ['placeholder' => 'Seleccione Día', 'class' => 'form-control', 'required'=>'required']) }}
                 </div>
             </div>
             <div class="contact-grids" style="padding: 0 15px;">
                 <input type="submit" value="ENVIAR">
             </div>
             {{ Form::close() }}
         </div>
         <div style="margin:15% 0;"></div>

	 </div>
</div>
<!-- contact -->
@stop

@section('script')
    <script>
        $(function () {
            $(".footer-menu a:contains('EXCUSAS')").parent().addClass('active');
        });
    </script>
@stop