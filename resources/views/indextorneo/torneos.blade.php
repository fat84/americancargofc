@extends('layouts.index')

@section('contenido')
    <div class="row">
    @include('partials.mensajes')

        <div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1" style="border: 0px; margin-top: 2%; margin-bottom: 10%;">
            <div class="panel panel-default">
                <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                    <h3 class="panel-title center-block" style="text-align: center;"><b>TORNEOS</b></h3>
                </div>
                <div class="table-responsive panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><b></b>Nombre</th>
                            <th><b></b>Fecha Inicio</th>
                            <th><b></b>Fecha Fin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($torneos as $torneo)
                            <tr>
                                <td class="text-capitalize"><a href="{{route('indexinfotorneo',$torneo->id)}}"><span>{{ $torneo->nombre }}</span></a></td>
                                <td class="text-capitalize">{{ $torneo->fechaini }}</td>
                                <td class="text-capitalize">{{ $torneo->fechafin }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pull-right">
                        {{ $torneos->appends(Request::only(['']))->render() }}
                    </div>
                </div>
            </div>


        </div>
    </div>


@stop

