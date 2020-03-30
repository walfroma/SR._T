
@extends('layouts.app')

@section('content')

    <div class="container">

        @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}}</li>
                </ul>
                @endforeach
            </div>
        @endif

{{ $Modo == 'crear' ? 'Agregar Lugar' : 'Modificar Lugar' }}

        <div class="form-group">
            <label for="Lugar" class="control-label"> {{'Lugar'}}</label>
            <input type="text" class="form-control {{$errors->has('Lugar') ? 'is-invalid' :'' }}" name="Lugar" id="Lugar" value="{{ isset($Lugar->Lugar)? $Lugar->Lugar:''}}">

            {!! $errors->first('Lugar','<div class="invalid-feedback"> :message</div>') !!}

        </div>



<input type="submit" class="btn btn-success" value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

<a class="btn btn-primary" href=" {{ url('Lugar') }}">Regrasar Lugar</a>
    </div>
@endsection
