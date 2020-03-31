
@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Lugar' : 'Modificar Lugar' }}</div>
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
                            <label for="Lugar" class="control-label"> {{'Lugar'}}</label>
                            <input type="text" class="form-control {{$errors->has('Lugar') ? 'is-invalid' :'' }}" name="Lugar" id="Lugar" value="{{ isset($Lugar->Lugar)? $Lugar->Lugar:''}}">

                             {!! $errors->first('Lugar','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                             <div class=" form-inline mb-2 mb-lg-0 col v-center">
                                 <div class="input-group">
                                    <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                     <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Lugar') }}">Regrasar Lugar</a>
                                 </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
