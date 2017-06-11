@extends('layouts.index')

@section('contenido')
<div class="gallery-head">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="principal.blade.html">Inicio</a></li>
		  <li class="active">Galeria</li>
		 </ol>
	 </div>
	 <div class="gallery-text">
		 <div class="container">
		 <h2>GALERIA</h2>
		 <p></p>
		 </div>
	 </div>
	 <div class="container">	
		 <div class="main">
		 <div class="gallery">	
			  <section>
				  <ul class="lb-album">
					  <li>
						 <a href="#image-1">
						     <img src="images/galeria/g1.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-1">
							 <img src="images/galeria/g1.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-abt2">
						     <img src="images/galeria/g2.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-abt2">
							 <img src="images/galeria/g2.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-2">
						     <img src="images/galeria/g3.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-2">
							 <img src="images/galeria/g3.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-4">
						     <img src="images/galeria/g4.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-4">
							 <img src="images/galeria/g4.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>							
				 </ul>
				 <ul class="lb-album">
					  <li>
						 <a href="#image-5">
						     <img src="images/galeria/g5.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-5">
							 <img src="images/galeria/g5.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-6">
						     <img src="images/galeria/g6.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-6">
							 <img src="images/galeria/g6.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-abt1">
						     <img src="images/galeria/g7.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-abt1">
							 <img src="images/galeria/g7.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>
					  <li>
						 <a href="#image-g8">
						     <img src="images/galeria/g8.jpg" class="img-responsive" alt="">
							 <span> </span>
						 </a>
						  <div class="lb-overlay" id="image-g8">
							 <img src="images/galeria/g8.jpg" class="img-responsive" alt="image03">
							 <a href="#page" class="lb-close"> </a>
						 </div>
					  </li>							
				 </ul>
			 </section>
			 <div class="clearfix"> </div>
		  </div>
			</div>
	 </div>
</div>
@stop

@section('script')
    <script>
        $(function () {
            $(".top-menu a:contains('GALERIA')").parent().addClass('active');
        });
    </script>
@stop