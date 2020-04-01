
@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Negocio' : 'Modificar Negocio' }}</div>
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
                            <label for="Nombre" class="control-label"> {{'Negocio'}}</label>
                            <input type="text" class="form-control {{$errors->has('Negocio') ? 'is-invalid' :'' }}" name="Negocio" id="Negocio" value="{{ isset($Negocio->Negocio)? $Negocio->Negocio:''}}">
                            <br/>
                            <label for="Telefono" class="control-label"> {{'Telefono'}}</label>
                            <input type="text" class="form-control {{$errors->has('Telefono') ? 'is-invalid' :'' }}" name="Telefono" id="Telefono" value="{{ isset($Negocio->Telefono)? $Negocio->Telefono:''}}">
                            <br/>
                            <label for="Direccion" class="control-label"> {{'Direccion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Direccion') ? 'is-invalid' :'' }}" name="Direccion" id="Direccion" value="{{ isset($Negocio->Direccion)? $Negocio->Direccion:''}}">
                            <br/>
                            <label for="Ubicacion" class="control-label"> {{'Ubicacion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Ubicacion') ? 'is-invalid' :'' }}" name="Ubicacion" id="Ubicacion" value="{{ isset($Negocio->Ubicacion)? $Negocio->Ubicacion:''}}">
                            <br/>
                            <label for="Correo" class="control-label"> {{'Correo'}}</label>
                            <input type="text" class="form-control {{$errors->has('Correo') ? 'is-invalid' :'' }}" name="Correo" id="Correo" value="{{ isset($Negocio->Correo)? $Negocio->Correo:''}}">
                            <br/>
                            <label for="usuarios_id" class="control-label"> {{'Usuario'}}</label>
                            <select name="usuarios_id" id="usuarios_id" class="form-control" value="{{ isset($Usuario->usuarios_id)? $Usuario->usuarios_id:''}}">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Usuario as $Usuario )

                                    <option value="{{$Usuario['id']}} "> {{$Usuario['Nombre']}}  {{$Usuario['Apellido']}}</option>
                                @endforeach
                            </select>

                            <br/>




                            {!! $errors->first('Negocio','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Negocio') }}">Regrasar Negocio</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

