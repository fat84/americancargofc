@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                {{ Form::label('rol_id', 'Rol', ['class' => 'control-label']) }}
                <select name="rol_id" id="" class="form-control">
                    @foreach($persona as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                        @foreach($rol as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                </select>

            </div>
        </div>
    </div>
@endsection

