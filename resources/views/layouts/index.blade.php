<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>AtleticoNorte f.c.</title>
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>	
	   <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>		
	<!--//fonts-->		
		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
		<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- Font Awesome -->
    {{ Html::style('dist/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ Html::style('dist/css/ionicons.min.css') }}
	{{ Html::style('distindex/styindex.css') }}

	@yield('css')
	<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="soccer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- js -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- js -->

</head>
<body>
<!-- header -->
<div class="header">
	 <div class="container">
		 <div class="logo">
			   <h1><a href="index.html">Atletico Norte F.C.</a></h1>
                <!--<img src="images/escudo.jpg" alt="">-->
		 </div>	
		 <div class="top-menu">
			 <span class="menu"></span>
			  <ul>
				 <li><a href="{{ url('/') }}">INICIO</a></li>
				 <li><a href="{{ url('nosotros') }}">NOSOTROS</a></li>
				 <li><a href="{{ url('galerias') }}">GALERIA</a></li>
				 <li><a href="{{ url('galerias/lista') }}">GALERIA</a></li>
				 <li><a href="{{ url('indexinformes') }}">INFORMES</a></li>
				 <li><a href="#">EVENTOS</a></li>
				 <li><a href="{{ url('contacto') }}">CONTACTO</a></li>
			 </ul>
		 </div>			
		 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->	  	

		 <div class="clearfix"></div>
	 </div>
</div>
<!-- //header -->
<!-- banner -->
<div class="strip">
	 <div class="container">

	 <div class="social">
			 <a href="https://www.facebook.com/atleticonortef/" target ="_blank"><i class="facebook"></i></a>
			 <a href="#"><i class="youtube"></i></a>
	 </div>
		<div class="clearfix"></div>
		</div>
</div>

@yield('contenido')

<br><br>


<!-- //content-bottom -->
<!--footer-->
<div class="footer">
	 <div class="container">
		 <div class="copywrite">
			 <p>© 2017 All Rights Reseverd Design by <a href="http://innotechsolutions.co/">InnotechSolutions</a> </p>
		 </div>
		 <div class="footer-menu">
			 <ul>
                 <li><a href="{{ url('excusas') }}">EXCUSAS</a></li>
                 <li><a href="{{ url('juntadirectiva') }}">JUNTA DIRECTIVA</a></li>
				 <li><a href="http://www.atleticonortefc.org/webmail" target="_blank">EMAIL</a></li>
				 <li><a href="{{ url('login') }}">LOGIN</a></li>
			 </ul>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!-- //footer -->

<!-- jQuery 2.1.4-->

<!-- Bootstrap 3.3.5-->
{{ Html::script('dist/js/bootstrap.min.js') }}
{{ Html::script('dist/js/app.min.js') }}

{{--{{ Html::script('js/jquery.min.js') }}--}}

<!-- Agregar nuevos script --->
@yield('script')

</body>
</html>