@extends('layouts.index')

@section('contenido')
<div class="row">

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 2%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>FECHAS DE PARTIDOS</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><b>FECHA</b></th>
                            <th><b>LUGAR</b></th>
                            <th><b>HORA</b></th>
                            <th><b>EQUIPO 1</b></th>
                            <th><b>GOLES</b></th>
                            <th><b>EQUIPO 2</b></th>
                            <th><b>GOLES</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> 16/03/2017</td>
                            <td> Villa Silvania </td>
                            <td> 9:00 PM </td>
                            <td> Tottenham </td>
                            <td> - </td>
                            <td> Newcastle </td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td> 16/03/2017 </td>
                            <td> Villa Silvania </td>
                            <td> 7:00 PM </td>
                            <td> Livepool </td>
                            <td> - </td>
                            <td> Arsenal </td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td> 13/03/2017 </td>
                            <td> Coveadse </td>
                            <td> 9:00 PM </td>
                            <td> Manchester United </td>
                            <td> 4 </td>
                            <td> Chapecoense </td>
                            <td> 5 </td>
                        </tr>
                        <tr>
                            <td> 13/03/2017 </td>
                            <td> Coveadse </td>
                            <td> 7:00 PM </td>
                            <td> Watford </td>
                            <td> 4 </td>
                            <td> Arsenal </td>
                            <td> 2 </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>TABLA DE POSICIONES</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;"><b>EQUIPO</b></th>
                            <th><b>PJ</b></th>
                            <th><b>PG</b></th>
                            <th><b>PE</b></th>
                            <th><b>PP</b></th>
                            <th><b>GF</b></th>
                            <th><b>GC</b></th>
                            <th><b>DG</b></th>
                            <th><b>PTS</b></th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> LIVERPOOL </td>
                                <td> 16 </td>
                                <td> 9 </td>
                                <td> 6 </td>
                                <td> 1 </td>
                                <td> 30 </td>
                                <td> 19 </td>
                                <td> 11 </td>
                                <td> 33 </td>
                            </tr>
                            <tr>
                                <td> NEWCASTLE </td>
                                <td> 16 </td>
                                <td> 6 </td>
                                <td> 4 </td>
                                <td> 6 </td>
                                <td> 32 </td>
                                <td> 32 </td>
                                <td> 0 </td>
                                <td> 22 </td>
                            </tr>
                            <tr>
                                <td> TOTTENHAM </td>
                                <td> 15 </td>
                                <td> 5 </td>
                                <td> 6 </td>
                                <td> 4 </td>
                                <td> 29 </td>
                                <td> 29 </td>
                                <td> 0 </td>
                                <td> 21 </td>
                            </tr>
                            <tr>
                                <td> MANCHESTER CITY </td>
                                <td> 16 </td>
                                <td> 5 </td>
                                <td> 5 </td>
                                <td> 6 </td>
                                <td> 34 </td>
                                <td> 33 </td>
                                <td> 1 </td>
                                <td> 20 </td>
                            </tr>
                            <tr>
                                <td> MANCHESTER UNITED </td>
                                <td> 16 </td>
                                <td> 5 </td>
                                <td> 4 </td>
                                <td> 7 </td>
                                <td> 45 </td>
                                <td> 53 </td>
                                <td> -8 </td>
                                <td> 19 </td>
                            </tr>
                            <tr>
                                <td> CHAPECOENSE </td>
                                <td> 15 </td>
                                <td> 5 </td>
                                <td> 3 </td>
                                <td> 7 </td>
                                <td> 36 </td>
                                <td> 38 </td>
                                <td> -2 </td>
                                <td> 18 </td>
                            </tr>
                            <tr>
                                <td> ARSENAL </td>
                                <td> 15 </td>
                                <td> 4 </td>
                                <td> 6 </td>
                                <td> 5 </td>
                                <td> 32 </td>
                                <td> 30 </td>
                                <td> 2 </td>
                                <td> 18 </td>
                            </tr>
                            <tr>
                                <td> WATFORD </td>
                                <td> 15 </td>
                                <td> 4 </td>
                                <td> 4 </td>
                                <td> 7 </td>
                                <td> 33 </td>
                                <td> 37 </td>
                                <td> -4 </td>
                                <td> 16 </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>VALLA MENOS VENCIDA</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;"><b>NOMBRE</b></th>
                            <th><b>EQUIPO</b></th>
                            <th><b>GOLES</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> JOSE MANUEL ARIAS </td>
                            <td> LIVERPOOL </td>
                            <td> 19 </td>
                        </tr>
                        <tr>
                            <td> MAURICIO SALOM </td>
                            <td> TOTTENHAM </td>
                            <td> 29 </td>
                        </tr>
                        <tr>
                            <td> RONALD PIERRE ALVAREZ </td>
                            <td> ARSENAL </td>
                            <td> 30 </td>
                        </tr>
                        <tr>
                            <td> EDUARDO MENDOZA </td>
                            <td> NEWCASTLE </td>
                            <td> 32 </td>
                        </tr>
                        <tr>
                            <td> IVAN LOPEZ </td>
                            <td> MANCHESTER CITY </td>
                            <td> 33 </td>
                        </tr>
                        <tr>
                            <td> WILSON LIZARAZO </td>
                            <td> WATFORD </td>
                            <td> 37 </td>
                        </tr>
                        <tr>
                            <td> ALEXIS MANRIQUE </td>
                            <td> CHAPECOENSE </td>
                            <td> 38 </td>
                        </tr>
                        <tr>
                            <td> FREDI ARCHILA </td>
                            <td> MANCHESTER UNITED </td>
                            <td> 53 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>GOLEADORES</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;"><b>NOMBRE</b></th>
                            <th><b>EQUIPO</b></th>
                            <th><b>GOLES</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> GABRIEL BOTELLO </td>
                            <td> MANCHESTER UNITED </td>
                            <td> 16 </td>
                        </tr>
                        <tr>
                            <td> ELKIN MENDOZA </td>
                            <td> MANCHESTER CITY </td>
                            <td> 14 </td>
                        </tr>
                        <tr>
                            <td> LUIS SANCHEZ </td>
                            <td> WATFORD </td>
                            <td> 13 </td>
                        </tr>
                        <tr>
                            <td> JESUS MONTAÑEZ </td>
                            <td> NEWCASTLE </td>
                            <td> 13 </td>
                        </tr>
                        <tr>
                            <td> DANIEL GRANADOS </td>
                            <td> LIVERPOOL </td>
                            <td> 11 </td>
                        </tr>
                        <tr>
                            <td> DUBIAN GOMEZ </td>
                            <td> CHAPECOENSE </td>
                            <td> 10 </td>
                        </tr>
                        <tr>
                            <td> OMAR GARCIA </td>
                            <td> MANCHESTER UNITED </td>
                            <td> 10 </td>
                        </tr>
                        <tr>
                            <td> JUAN MANUEL FUENTES </td>
                            <td> TOTTENHAM </td>
                            <td> 8 </td>
                        </tr>
                        <tr>
                            <td> JUAN CARLOS SALCEDO </td>
                            <td> CHAPECOENSE </td>
                            <td> 8 </td>
                        </tr>
                        <tr>
                            <td> FREDDY CHAUSTRE </td>
                            <td> TOTTENHAM </td>
                            <td> 8 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>TARJETAS ROJAS</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;"><b>NOMBRE</b></th>
                            <th><b>EQUIPO</b></th>
                            <th><b>TARJETA ROJA</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> GERARDO RANGEL </td>
                            <td> TOTTENHAM </td>
                            <td> 2 </td>
                        </tr>
                        <tr>
                            <td> JUAN MANUEL FUENTES </td>
                            <td> TOTTENHAM </td>
                            <td> 2 </td>
                        </tr>
                        <tr>
                            <td> ELKIN FLOREZ </td>
                            <td> NEWCASTLE </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> EDUARDO MENDOZA </td>
                            <td> NEWCASTLE </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> RICARDO BARRIO </td>
                            <td> ARSENAL </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> ALEXANDER GOMEZ </td>
                            <td> CHAPECOENSE </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> HENRY PARRA </td>
                            <td> WATFORD </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> WILMER HERNANDEZ </td>
                            <td> WATFORD </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> RONALD ALVAREZ </td>
                            <td> ARSENAL </td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> JOSE LUIS PEÑA ORTEGA </td>
                            <td> CHAPECOENSE </td>
                            <td> 1 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>TARJETAS AMARILLAS</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;"><b>NOMBRE</b></th>
                            <th><b>EQUIPO</b></th>
                            <th><b>TARJETAS AMARILLAS</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> RUDVEL RAMOS</td>
                            <td> MANCHESTER UNITED </td>
                            <td> 6 </td>
                        </tr>
                        <tr>
                            <td> ERNESTO GALLO</td>
                            <td> CHAPECOENSE </td>
                            <td> 5 </td>
                        </tr>
                        <tr>
                            <td> EDWIN GOMEZ </td>
                            <td> NEWCASTLE </td>
                            <td> 4 </td>
                        </tr>
                        <tr>
                            <td> GERSON URBINA </td>
                            <td> WATFORD </td>
                            <td> 4 </td>
                        </tr>
                        <tr>
                            <td> JESUS PEÑARANDA </td>
                            <td> NEWCASTLE </td>
                            <td> 4 </td>
                        </tr>
                        <tr>
                            <td> GUSTAVO CONTRERAS </td>
                            <td> MANCHESTER CITY </td>
                            <td> 4 </td>
                        </tr>
                        <tr>
                            <td> JEAN PIERRE RANGEL </td>
                            <td> ARSENAL </td>
                            <td> 3 </td>
                        </tr>
                        <tr>
                            <td> ELKIN RANGEL </td>
                            <td> NEWCASTLE </td>
                            <td> 3 </td>
                        </tr>
                        <tr>
                            <td> JUAN MANUEL FUENTES </td>
                            <td> TOTTENHAM </td>
                            <td> 3 </td>
                        </tr>
                        <tr>
                            <td> BLADIMIR PATIÑO </td>
                            <td> WATFORD </td>
                            <td> 3 </td>
                        </tr>
                        <tr>
                            <td> CARLOS SOCHA </td>
                            <td> TOTTENHAM </td>
                            <td> 3 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-8 col-md-offset-2" style="margin-bottom: 2%; margin-top: 0%;">
        <div class="panel panel-default">
            <div class="panel-heading center-block" style="background: #ed645c; color: #ffffff;">
                <h3 class="panel-title center-block" style="text-align: center;"><b>SANCIONES DISCIPLINARIAS</b></h3>
            </div>
            <div class="panel-body" style=" font-size: 120%; text-align: justify;">
                <div class="table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><b>NOMBRE</b></th>
                            <th><b>EQUIPO</b></th>
                            <th><b>INFRACCION</b></th>
                            <th><b>FECHA</b></th>
                            <th><b>CANTIDAD FECHAS</b></th>
                            <th><b>DESDE</b></th>
                            <th><b>HASTA</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> FREDI ARCHILA</td>
                            <td> MANCHESTER UNITED </td>
                            <td> TARJETA ROJA DIRECTA </td>
                            <td> 13/03/2017 </td>
                            <td> 2 FECHAS </td>
                            <td> 23/03/2017 </td>
                            <td> 25/03/2017 </td>
                        </tr>
                        <tr>
                            <td> RUDVEL RAMOS </td>
                            <td> MANCHESTER UNITED </td>
                            <td> TARJETAS AMARILLAS ACUMULADAS (5) </td>
                            <td> 11/03/2017 </td>
                            <td> 1 FECHA </td>
                            <td> 13/03/2017 </td>
                            <td> 13/03/2017 </td>
                        </tr>
                        <tr>
                            <td> GERARDO RANGEL </td>
                            <td> TOTTENHAM </td>
                            <td> TARJETA ROJA (REINCIDENCIA 1 VEZ) </td>
                            <td> 04/03/2017 </td>
                            <td> 3 FECHAS </td>
                            <td> 06/03/2017 </td>
                            <td> 16/03/2017 </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
@stop

@section('script')

@stop


