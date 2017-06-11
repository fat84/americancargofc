@extends('layouts.index')

@section('contenido')
<div class="">

	 <div class="container">
         <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 5%;">
             @include('partials.mensajes')
             <div class="panel panel-default">
                 <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                     <h3 class="panel-title center-block" style="text-align: center;"><b>INFORMES</b></h3>
                 </div>
                 <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                     <div class="table-responsive no-padding">

                         <table class="table table-hover">
                             <thead>
                             <tr>
                                 <th><b>NOMBRE INFORME</b></th>
                             </tr>
                             </thead>
                             <tbody>
                             @foreach($informes as $informe)
                                 <tr>
                                     <td><a href="{{route('indexarchivosinformes',$informe->id)}}"><span>{{ $informe->nombre }}</span></a></td>
                                 </tr>
                             @endforeach
                             </tbody>
                         </table>
                         <div class="pull-right">
                             {{ $informes->appends(Request::only(['']))->render() }}
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