<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AtleticoNorteFC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
      {{ Html::style('dist/css/bootstrap.min.css') }}
      <!-- Font Awesome -->
      {{ Html::style('dist/css/font-awesome.min.css') }}
      <!-- Ionicons -->
      {{ Html::style('dist/css/ionicons.min.css') }}
    <!-- Theme style -->
      {{ Html::style('dist/css/AdminLTE.min.css') }}
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="dist/js/html5shiv.min.js"></script>
      <script src="dist/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Atletico Norte F.C</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">

        <p class="login-box-msg">Iniciar session</p>

          {!! Form::open(array('url' => 'login', 'method' => 'POST')) !!}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      @if ($errors->has('email'))
                          <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                      @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      @if ($errors->has('password'))
                          <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                      @endif
              </div>


          <div class="row">
            <div class="col-xs-8">
              <!--<div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>-->
                {{--<a href="{{ url('/password/reset') }}">Restablecer mi password</a><br>--}}
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
            </div><!-- /.col -->
          </div>
          {!! Form::close() !!}



      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    {{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!-- Bootstrap 3.3.5 -->
    {{ Html::script('dist/js/bootstrap.min.js') }}

  </body>
</html>
