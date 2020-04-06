
@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar tamaño de  Bateria' : 'Modificar tamaño de Bateria' }}</div>
                    <div class="card-body">



                        @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li> {{$error}}</li>
                                </ul>
                                @endforeach
                            </div>
                        @endif



                        <div class="form-group">
                            <label for="Bateria" class="control-label"> {{'Bateria'}}</label>
                            <input type="text" class="form-control {{$errors->has('Bateria') ? 'is-invalid' :'' }}" name="Bateria" id="Bateria" value="{{ isset($Bateria->Bateria)? $Bateria->Bateria:''}}">

                            {!! $errors->first('Bateria','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Bateria') }}">Regrasar panel de Baterias </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
