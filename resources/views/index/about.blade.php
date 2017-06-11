@extends('layouts.index')

@section('contenido')
<!-- about -->
<div class="about">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="principal.blade.html">Inicio</a></li>
		  <li class="active">Nosotros</li>
		 </ol>
		 <h2>NOSOTROS</h2>
		 <div class="about-head">
			 <p>
                 CORP ATLETICO NORTE FC ES UN CLUB DE PROFESIONALES AMIGOS DEL FUTBOL AMATEUR - CIUDAD CUCUTA - DEPTO NORTE DE SANTANDER - COLOMBIA - SURAMERICA
             </p>
		 </div>
		 <div class="about-grids">
			 <div class="about-grid">
				 <h3>HISTORIA</h3>
				 <p class="abt-info">
                     El CLUB ATLETICO NORTE FC fue fundado a principios del año 2004 (01 MARZO) y se creó con el único propósito de estar unidos por “LA AMISTAD, LA SALUD Y EL DEPORTE”, y fue una iniciativa de un grupo de amigos con pasión al Fútbol y contando con el decidido empuje del fundador y primer presidente del club el Sr. Freddi Enrique Archila Vargas. En ese entonces se inicio con cerca de una docena de amigos cuyas prácticas se realizaba en la Cancha de Quinta Oriental en Cúcuta - Colombia, y posteriormente se fueron incorporando algunos amigos mas, hecho que hizo necesario buscar una cancha mas grande, y se logro alquilar la cancha de COVEADSE (San Eduardo) en donde actualmente tenemos a préstamo la cancha los días Lunes y Sábado. También se realizan otros encuentros de campeonato en la cancha gramada de COMFAORIENTE (VILLA SILVANIA) los días Jueves en la noche.
                 </p>
				 <p>
                     Entre los primeros socios Fundadores se encontraban: Freddi Archila, Heriberto Gálvis, Felix Cárdenas, Yesid Cely, John Archila, Hermes Hernández, Javier Ballén, Arley Romero, Jesús Romero,  Nelson Cely, Eliumer Pedraza, Luís Fernando Rojas, Henry Ortiz, Nelson Camacho, Héctor Sierra, Iván López, Jorge Torres, Luis Ballen, Alonso Parra, Gustavo Suárez, Carlos Rangel y Elkin Mendoza.
                 </p>
                 <p>
                     Actualmente el Club cuenta con personería Jurídica emitida por el IMRD mediante Resolución No. 0112 del 01 Diciembre-2015 y RUT DIAN 900.923.894-3, somos 144 socios de distintas profesiones: Abogados, Médicos, Ingenieros, Contadores Públicos, Diseñadores gráficos, Ingenieros de Sistemas, Economistas y también Empleados y comerciantes independientes.
                 </p>
                 <p>
                     El Club realiza cada año dos campeonatos internos, uno por cada semestre, en donde se sortean los jugadores activos en ocho (8) equipos.
                 </p>

			</div>
			 <div class="about-pic">
				 <img src="images/abt.jpg" alt=""/>
				 <img src="images/abt2.jpg" alt=""/>
			 </div>
			 <div class="clearfix"></div>
		 </div>
		 <!--<div class="abt_text">
				<div class="col-md-4 values">
					 <h3>Our Values</h3>
					 <div class="value-grd">
						 <span>01.</span>
						 <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
						 <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
					 </div>
					 <div class="value-grd">
						 <span>02.</span>
						 <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
						 <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
					 </div>
					 <div class="value-grd">
						 <span>03.</span>
						 <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
						 <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
					 </div>
				</div>
				<div class="col-md-4 skills">
					 <h3>Our Skills</h3>
					 <h4>Aenean fermentum neque sagittis, feugiat diam sit amet, efficitur ex.</h4>
					 <p>Etiam id maximus enim. Integer a mauris tempor, vestibulum neque vel, molestie risus. Mauris congue interdum 
					 nibh ut cursus. Fusce cursus, neque at tristique eleifend, nisl erat euismod nulla, dictum aliquam justo purus at metus.</p>
					 <ul>
						<li><a href="#">Proin non sapien nec risus eleifend malesuada.</a></li>
						<li><a href="#">Sed volutpat nulla a consequat venenatis.</a></li>
						<li><a href="#">Quisque vitae nisl sit amet magna tempor finibus.</a></li>
						<li><a href="#">Praesent in velit et mi tempor molestie ut et arcu.</a></li>
						<li><a href="#">Sed volutpat nulla a consequat venenatis.</a></li>
						<li><a href="#">Donec euismod purus a aliquam dapibus.</a></li>
						<li><a href="#">Praesent in velit et mi tempor molestie ut et arcu.</a></li>
						<li><a href="#">Etiam at dolor at eros finibus viverra.</a></li>
					</ul>
				</div>
				<div class="col-md-4 testi">
					 <h3>Testimonals</h3>
				     <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
					 Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
					 <a href="#">JOHN FRANKLIN</a>
					 <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
					 Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
					 <a href="#">TOM MENDERW</a>
					 <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
					 Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
					 <a href="#">ALIN SMITH</a>
				</div>
				<div class="clearfix"></div>
		 </div>	-->
	 </div>
</div>
<!-- //about -->
@stop

@section('script')
    <script>
        $(function () {
            $(".top-menu a:contains('NOSOTROS')").parent().addClass('active');
        });
    </script>
@stop