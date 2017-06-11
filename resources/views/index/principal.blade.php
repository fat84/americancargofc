@extends('layouts.index')

@section('contenido')

    <!-- banner -->
    <div class="banner">
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    speed: 300,
                    manualControls: '#slider3-pager',
                });
            });
        </script>

        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>
                        <img src="images/bnr2.jpg" alt="">
                    </li>
                    <li>
                        <img src="images/bnr3.jpg" alt="">
                    </li>
                    <li>
                        <img src="images/bnr1.jpg" alt="">
                    </li>
                </ul>
            </div>
        </div>
        <!---->

        <!---start-content----->
        <div class="banner-bottom-grids">
            <div class="container">
                <div class="col-md-6 banner-text-info clr1">
                    <i class="icon1"></i>
                    <div class="bnr-text">
                        <a href="{{ url('indextorneos') }}"><h3>TORNEOS</h3></a>
                        <a href="{{ url('indextorneos') }}"><p>En esta sección se encontraran los equipos que se disputan en los diferentes campeonatos.</p></a>
                    </div>
                </div>
                <div class="col-md-6 banner-text-info clr2">
                    <i class="icon4"></i>
                    <div class="bnr-text">
                        <a href="{{ url('galeria') }}"><h3>GALERIA</h3></a>
                        <a href="{{ url('galeria') }}"><p>Imágenes de los distintos eventos y campeonatos que se han llevado en el club.</p><br></a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-6 banner-text-info clr3 btm">
                    <i class="icon2"></i>
                    <div class="bnr-text">
                        <a href="#"><h3>INFORMES</h3></a>
                        <a href="#"><p>En esta sección podrá encontrar los diferentes informes que se llevan a cabo en nuestro club.</p></a>
                    </div>
                </div>
                <div class="col-md-6 banner-text-info clr4 btm">
                    <i class="icon3"></i>
                    <div class="bnr-text">
                        <a href="#"><h3>JUNTA DIRECTIVA</h3></a>
                        <a href="#"><p>Información de los de los socios pertenecientes al club deportivo Atlético Norte.</p><br></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //banner -->

@stop

@section('script')
    <script>
        $(function () {
            $(".top-menu a:contains('INICIO')").parent().addClass('active');
        });
    </script>
@stop


