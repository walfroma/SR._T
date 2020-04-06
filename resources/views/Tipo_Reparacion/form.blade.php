
@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Tipo_Reparacion' : 'Modificar Tipo_Reparacion' }}</div>
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
                            <label for="Descripcion" class="control-label"> {{'Tipo Reparacion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' :'' }}" name="Descripcion" id="Descripcion" value="{{ isset($TipoReparacion->Descripcion)? $TipoReparacion->Descripcion:''}}">

                            {!! $errors->first('Tipo_Reparacion','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Tipo_Reparacion') }}">Regrasar panel de Tipo Reparacions </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
