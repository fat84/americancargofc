@extends('layouts.index')

@section('contenido')

    <div class="row" style="margin-top: 5%;">
        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-default">
                <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                    <h3 class="panel-title center-block" style="text-align: center;"><b>INICIAR SESSION</b></h3>
                </div>
                <div class="panel-body" style=" font-size: 120%; text-align: justify;">

                    <div class="login-box">

                        <div class="login-box-body">

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

                                </div><!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: #ed645c; border-color: #ed645c;">Iniciar</button>
                                </div><!-- /.col -->
                            </div>
                            {!! Form::close() !!}



                        </div><!-- /.login-box-body -->
                    </div><!-- /.login-box -->

                </div>
            </div>



        </div>
    </div>

@stop

@section('script')

@stop