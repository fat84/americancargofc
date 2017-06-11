@extends('layouts.admin')

@section('pageheader')
    PRIVILEGIOS DEFAULT
@stop

@section('content')

    @include('partials.mensajes')

    <div class="box">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nombre Rol</th>
                        <th class="text-center">Privilegios Default</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                        <tr>
                            <td class="text-center">{{ $rol->nombre }}</td>
                            <td class="text-center">
                                    <div class="btn-group">
                                        {{ Form::open(['route' => ['showprivilegiodefaultrol', $rol->id], 'method' => 'POST']) }}
                                        <button type="submit" class="btn btn-default">Asignar</button>
                                        {{ Form::close() }}
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
