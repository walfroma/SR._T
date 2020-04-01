
@extends('layouts.app')

@section('content')
<form>
    <div class="container">

        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Usuario' : 'Modificar Usuario' }}</div>
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
                            <label for="Nombre" class="control-label"> {{'Nombre'}}</label>
                            <input type="text" class="form-control {{$errors->has('Nombre') ? 'is-invalid' :'' }}" name="Nombre" id="Nombre" value="{{ isset($Usuario->Nombre)? $Usuario->Nombre:''}}">
                            <br/>
                            <label for="Apellido" class="control-label"> {{'Apellido'}}</label>
                            <input type="text" class="form-control {{$errors->has('Apellido') ? 'is-invalid' :'' }}" name="Apellido" id="Apellido" value="{{ isset($Usuario->Apellido)? $Usuario->Apellido:''}}">
                            <br/>
                            <label for="Telefono" class="control-label"> {{'Telefono'}}</label>
                            <input type="text" class="form-control {{$errors->has('Telefono') ? 'is-invalid' :'' }}" name="Telefono" id="Telefono" value="{{ isset($Usuario->Telefono)? $Usuario->Telefono:''}}">
                            <br/>
                            <label for="Direccion" class="control-label"> {{'Direccion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Direccion') ? 'is-invalid' :'' }}" name="Direccion" id="Direccion" value="{{ isset($Usuario->Direccion)? $Usuario->Direccion:''}}">
                            <br/>
                            <label for="Tipo_Usuario" class="control-label"> {{'Tipo_Usuario'}}</label>
                            <select name="Tipo_Usuario" id="inputTipo_Usuario" class="form-control" id="Tipo_Usuario" value="{{ isset($Usuario->Tipo_Usuario)? $Usuario->Tipo_Usuario:''}}">

                                <option value=""> Seleccion Opcion </option>
                                <option value="Cliente"> Cliente </option>
                                <option value="Administrador"> Administrador </option>
                            </select>
                            <br/>

                            <label for="lugars_id" class="control-label"> {{'Lugar'}}</label>
                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#exampleModalCenter">Crear Lugar</a>
                            <select name="lugars_id" id="inputlugars_id" class="form-control" value="{{ isset($Lugar->lugras_id)? $Lugar->lugras_id:''}}">
                                <option value=""> -- Seleccione Opcion --</option>
                                @foreach($Lugar as $Lugar )

                                    <option value="{{$Lugar['id']}} "> {{$Lugar['Lugar']}} </option>
                                @endforeach
                            </select>

                            <br/>




                            {!! $errors->first('Usuario','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Usuario') }}">Regrasar Usuario</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>>

    <!– Esta es la pantilla  –>
    <form action ='{{ url('Lugar') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="Lugar" class="control-label"> {{'Lugar'}}</label>
                            <input type="text" class="form-control " name="Lugar" id="Lugar">

                            {!! $errors->first('Lugar','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <a href="{{'/Usuario/create'}}"><input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}"></a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
        </div>
    </form>



@endsection


