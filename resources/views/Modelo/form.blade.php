
@extends('layouts.app')

@section('content')
<form>
    <div class="container">

        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Modelo' : 'Modificar Modelo' }}</div>
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
                            <label for="Modelo" class="control-label"> {{'Modelo'}}</label>
                            <input type="text" class="form-control {{$errors->has('Modelo') ? 'is-invalid' :'' }}" name="Modelo" id="Modelo" value="{{ isset($Modelo->Modelo)? $Modelo->Modelo:''}}">
                            <br/>

                            <label for="marcas_id" class="control-label"> {{'Marca'}}  </label>
                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#exampleModalCenter">Crear Marca</a>
                            <select name="marcas_id" id="inputMarca_id" class="form-control" value="{{ isset($Marca->marcas_id)? $Marca->marcas_id:''}}">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Marca as $Marca )

                                    <option value="{{$Marca['id']}} "> {{$Marca['Marca']}}</option>
                                @endforeach
                            </select>
                            <br/>

                            <label for="resolucion" class="control-label"> {{'resolucion'}}</label>
                            <input type="text" class="form-control {{$errors->has('resolucion') ? 'is-invalid' :'' }}" name="resolucion" id="resolucion" value="{{ isset($Modelo->resolucion)? $Modelo->resolucion:''}}">
                            <br/>
                            <label for="Cam_Tras" class="control-label"> {{'Cam_Tras'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cam_Tras') ? 'is-invalid' :'' }}" name="Cam_Tras" id="Cam_Tras" value="{{ isset($Modelo->Cam_Tras)? $Modelo->Cam_Tras:''}}">
                            <br/>
                            <label for="Cam_Front" class="control-label"> {{'Cam_Front'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cam_Front') ? 'is-invalid' :'' }}" name="Cam_Front" id="Cam_Front" value="{{ isset($Modelo->Cam_Front)? $Modelo->Cam_Front:''}}">
                            <br/>

                            <label for="MicroSD" class="control-label"> {{'MicroSD'}}</label>
                            <select name="MicroSD" class="form-control" id="MicroSD" value="{{ isset($Modelo->MicroSD)? $Modelo->MicroSD:''}}">
                                <option value=""> Seleccion Opcion </option>
                                <option value="Si"> Si </option>
                                <option value="No"> No </option>
                            </select>
                            <br/>

                            <label for="Lector_Huella" class="control-label"> {{'Lector_Huella'}}</label>
                            <select name="Lector_Huella" class="form-control" id="Lector_Huella" value="{{ isset($Modelo->Lector_Huella)? $Modelo->Lector_Huella:''}}">
                                <option value=""> Seleccion Opcion </option>
                                <option value="Si"> Si </option>
                                <option value="No"> No </option>
                            </select>
                            <br/>

                            <label for="SistemaOperativo" class="control-label"> {{'SistemaOperativo'}}</label>
                            <select name="SistemaOperativo" class="form-control" id="MicroSD" value="{{ isset($Modelo->SistemaOperativo)? $Modelo->SistemaOperativo:''}}">
                                <option value=""> Seleccion Opcion </option>
                                <option value="Si"> Android </option>
                                <option value="No"> IOS </option>
                            </select>
                            <br/>

                            <label for="Ram" class="control-label"> {{'Ram'}}</label>
                            <input type="text" class="form-control {{$errors->has('Ram') ? 'is-invalid' :'' }}" name="Ram" id="Ram" value="{{ isset($Modelo->Ram)? $Modelo->Ram:''}}">
                            <br/>
                            <label for="Almacenamiento" class="control-label"> {{'Almacenamiento'}}</label>
                            <input type="text" class="form-control {{$errors->has('Almacenamiento') ? 'is-invalid' :'' }}" name="Almacenamiento" id="Almacenamiento" value="{{ isset($Modelo->Almacenamiento)? $Modelo->Almacenamiento:''}}">
                            <br/>
                            <label for="Descripcion" class="control-label"> {{'Descripcion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' :'' }}" name="Descripcion" id="Descripcion" value="{{ isset($Modelo->Descripcion)? $Modelo->Descripcion:''}}">
                            <br/>







                            {!! $errors->first('Modelo','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Modelo') }}">Regrasar Modelo</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

    <!– Esta es la pantilla  –>
    <form action ='{{ url('Marca') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
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
                            <label for="Marca" class="control-label"> {{'Marca'}}</label>
                            <input type="text" class="form-control " name="Marca" id="Marca">

                            {!! $errors->first('Marca','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <a href="{{'/Modelo/create'}}"><input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}"></a>
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



