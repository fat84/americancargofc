@extends('layouts.index')

@section('contenido')
<div class="">
	 <div class="container">

         <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 5%;">
             <div class="panel panel-default">
                 <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                     <h3 class="panel-title center-block" style="text-align: center;"><b>INFORME: {{ $nombreinforme }}</b></h3>
                 </div>
                 <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                     <div class="table-responsive no-padding">

                         <table class="table table-hover">
                             <thead>
                             <tr>
                                 <th><b>NOMBRE ARCHIVO</b></th>
                                 <th><b>DESCARGAR</b></th>
                             </tr>
                             </thead>
                             <tbody>
                             @foreach($archivos as $archivo)
                                 <tr>
                                     <td>{{ $archivo->nombre }}</td>
                                     <td class="">
                                         <div class="btn-group">
                                             {{ Form::open(['route' => ['indexdescargararchivo', $archivo->id], 'method' => 'POST']) }}
                                             <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Descargar"><i class="glyphicon glyphicon-download-alt"></i></button>
                                             {!! Form::close() !!}
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                             </tbody>
                         </table>
                         <div class="pull-right">
                             {{ $archivos->appends(Request::only(['']))->render() }}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
	 </div>
</div>
@stop

@section('script')
    <script>
        $(function () {
            $(".top-menu a:contains('INFORMES')").parent().addClass('active');
        });
    </script>
@stop