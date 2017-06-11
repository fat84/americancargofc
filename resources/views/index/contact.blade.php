@extends('layouts.index')

@section('contenido')

    <div class="contact">
	 <div class="container">
		 <div class="contact-grids">
             @include('partials.mensajes')

             <h2>CONTACTO</h2>

             {{ Form::open(['route' => ['emailcontacto'], 'method' => 'POST']) }}

				<input name="nombre" type="text" placeholder="Nombre" required=" ">
				<input name="email" type="text" placeholder="Email" required=" ">
				<input name="telefono" type="text" placeholder="Telefono" required=" ">
				<textarea name="mensaje" placeholder="Mensaje..." required=" "></textarea>
				<input type="submit" value="ENVIAR">
                 {{ Form::close() }}
		 </div>
	 </div>
</div>
<!-- contact -->
@stop

@section('script')
    <script>
        $(function () {
            $(".top-menu a:contains('CONTACTO')").parent().addClass('active');
        });
    </script>
@stop