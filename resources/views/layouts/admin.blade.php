<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


      <title>Atletico Norte F.C.</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.5-->
      {{ Html::style('dist/css/bootstrap.min.css') }}
      <!-- Font Awesome -->
      {{ Html::style('dist/css/font-awesome.min.css') }}
      <!-- Ionicons -->
      {{ Html::style('dist/css/ionicons.min.css') }}
      <!-- Theme style-->
      {{ Html::style('dist/css/AdminLTE.min.css') }}
      {{ Html::style('https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') }}
      <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
            page. However, you can choose any other skin. Make sure you
            apply the skin class to the body tag so the changes take effect.
      -->
      {{ Html::style('dist/css/skins/skin-red-light.min.css') }}
      {{ Html::style('dist/css/bootstrap-switch.css') }}
      {{ Html::style('css/sweetalert.css') }}
      {{ Html::style('css/dropzone.min.css') }}
      {{ Html::style('css/basic.min.css') }}
      @yield('style')


    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="dist/js/html5shiv.min.js"></script>
      <script src="dist/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AN</b>F.C.</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Atletico Norte</b> F.C.</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{asset(''.Auth::user()->persona->foto.'')  }}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->persona->nombre }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{asset(''.Auth::user()->persona->foto.'')  }}" class="img-circle" alt="User Image">
                    <p>
                        {{ Auth::user()->persona->nombre }} {{ Auth::user()->persona->apellido }}
                      <small>{{ Auth::user()->rol->nombre }}</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{route('perfil')}}" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset(''.Auth::user()->persona->foto.'')  }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->persona->nombre }}</p>
              <!-- Status -->
              <a href="#"> {{ Auth::user()->rol->nombre }}</a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

              @if (session()->has('allprivilegios'))
                  <?php
                      $allprivilegios = session('allprivilegios');
                        foreach($allprivilegios as $privilegio) {
                          $idprivilegio = $privilegio->privilegio_id;
                          $crear = $privilegio->crear;
                          $eliminar = $privilegio->eliminar;
                          $editar = $privilegio->editar;
                          $consultar = $privilegio->consultar;

                          if($crear == 0 && $eliminar == 0 &&  $editar == 0 &&  $consultar == 0) {
                              continue;
                          }
                  ?>
                      @if($idprivilegio == 1 && $consultar == 1)
                        <li><a href="{{route('usuario')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
                      @elseif($idprivilegio == 2 && $consultar == 1)
                        <li><a href="{{url('galeria/index')}}"><i class="fa fa-image"></i> <span>Galeria</span></a></li>
                      @elseif($idprivilegio == 3 && $consultar == 1)
                        <li><a href="{{route('informe')}}"><i class="fa fa-pie-chart"></i> <span>Informes</span></a></li>
                      @elseif($idprivilegio == 4 && $consultar == 1)
                        <li><a href="#"><i class="fa fa-bars"></i> <span>Eventos</span></a></li>
                      @elseif($idprivilegio == 5 && $consultar == 1)
                        <li><a href="#"><i class="fa fa-users"></i> <span>Junta Directiva</span></a></li>
                      @elseif($idprivilegio == 6 && $consultar == 1)
                          <li><a href="{{route('torneos')}}"><i class="fa fa-trophy"></i> <span>Torneos</span></a></li>
                      @elseif($idprivilegio == 7 && $consultar == 1)
                        {{--<li><a href="{{route('socios')}}"><i class="fa fa-users"></i> <span>Socios</span></a></li>--}}
                      @endif
                  <?php } ?>
              @endif

          </ul><!-- /.sidebar-menu -->


        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header" style="background-color: #f9fafc; padding: 15px 15px 10px 15px;">
          <h1>
              @yield('pageheader')
            <small><!--Optional description--></small>

          </h1>
            <!--<ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
            </ol>-->
          </section>

          <!-- Main content -->
        <section class="content">
            @yield('content')
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">InnotechSolutions</a>.</strong> All rights reserved.
      </footer>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4-->
    {{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!-- Bootstrap 3.3.5-->
    {{ Html::script('dist/js/bootstrap.min.js') }}
    <!-- AdminLTE App-->
    {{ Html::script('dist/js/app.min.js') }}
    {{ Html::script('js/sweetalert.min.js') }}
    {{ Html::script('https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js') }}

    <script src="{{asset('dist/js/miscript.js')}}" type="application/javascript"></script>

    <!-- Agregar nuevos script --->
    @yield('script')

  </body>
</html>
