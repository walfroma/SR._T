
@extends('layouts.app')

@section('content')

    <div class="container ">

        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Producto' : 'Modificar Producto' }}</div>
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
                            <label for="negocios_id" class="control-label"> {{'Negocio'}}</label>
                            <select name="negocios_id" id="negocios_id" class="form-control" value="{{ isset($Negocio->negocios_id)? $Negocio->negocios_id:''}}">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Negocio as $Negocio )

                                    <option value="{{$Negocio['id']}} "> {{$Negocio['Negocio']}} </option>
                                @endforeach
                            </select>
                            <br/>

                            <label for="Categoria" class="control-label"> {{'Categoria'}}</label>
                            <select name="Categoria" class="form-control" id="Categoria" value="{{ isset($Producto->Categoria)? $Modelo->Categoria:''}}">
                                <option value=""> -- Seleccione Opcion --</option>
                                <option value="Telefono"> Telefono </option>
                                <option value="Reparacion"> Reparacion </option>
                            </select>
                            <br/>

                            <label for="modelos_id" class="control-label"> {{'Telefono'}}</label>
                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Telefono">Crear Telefono</a>
                            <select name="modelos_id" id="modelos_id" class="form-control" value="{{ isset($Modelo->modelos_id)? $Modelo->modelos_id:''}}">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Modelo as $Modelo )

                                    <option value="{{$Modelo['id']}} "> {{$Modelo['Modelo']}} </option>
                                @endforeach
                            </select>
                            <br/>

                            <label for="tipo_reparacions_id" class="control-label"> {{'Tipo Reparacion'}}</label>
                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Tipo_Reparacion">Crear Tipo de Reparacion</a>
                            <select name="tipo_reparacions_id" id="tipo_reparacions_id" class="form-control" value="{{ isset($Tipo_Reparacion->tipo_reparacions_id)? $Tipo_Reparacion->tipo_reparacions_id:''}}">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Tipo_Reparacion as $Tipo_Reparacion )

                                    <option value="{{$Tipo_Reparacion['id']}} "> {{$Tipo_Reparacion['Descripcion']}} </option>
                                @endforeach
                            </select>
                            <br/>

                            <label for="Descripcion" class="control-label"> {{'Descripcion'}}</label>
                            <textarea type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' :'' }}" name="Descripcion" id="Descripcion" value="{{ isset($Producto->Descripcion)? $Producto->Descripcion:''}}">
                            </textarea><br/>

                            <label for="Descripcion" class="control-label"> {{'Cantidad'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cantidad') ? 'is-invalid' :'' }}" name="Cantidad" id="Cantidad" value="{{ isset($Producto->Cantidad)? $Producto->Cantidad:''}}">
                            <br/>

                            <label for="Precio" class="control-label"> {{'Precio'}}</label>
                            <input type="text" class="form-control {{$errors->has('Precio') ? 'is-invalid' :'' }}" name="Precio" id="Precio" value="{{ isset($Producto->Precio)? $Producto->Precio:''}}">
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



    <!– Esta es la pantilla  –>
    <form action ='{{ url('Modelo') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade" id="Telefono" tabindex="-1" role="dialog" aria-labelledby="Telefono" aria-hidden="true">
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
                            <label for="usuarios_id" class="control-label"> {{'Marca'}}</label>
                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#exampleModalCenter">Crear Marca</a>
                            <select name="marcas_id" id="marcas_id" class="form-control">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Marca as $Marca )

                                    <option value="{{$Marca['id']}} "> {{$Marca['Marca']}} </option>
                                @endforeach
                            </select>
                            <br/>
                            <label for="Modelo" class="control-label"> {{'Modelo'}}</label>
                            <input type="text" class="form-control {{$errors->has('Modelo') ? 'is-invalid' :'' }}" name="Modelo" id="Modelo" >
                            <br/>

                            <label for="resolucion" class="control-label"> {{'Resolucion'}}</label>
                            <input type="text" class="form-control {{$errors->has('resolucion') ? 'is-invalid' :'' }}" name="resolucion" id="resolucion">
                            <br/>
                            <label for="Cam_Tras" class="control-label"> {{'Camara Trasera'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cam_Tras') ? 'is-invalid' :'' }}" name="Cam_Tras" id="Cam_Tras" >
                            <br/>
                            <label for="Cam_Front" class="control-label"> {{'Camara Frontal'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cam_Front') ? 'is-invalid' :'' }}" name="Cam_Front" id="Cam_Front" >
                            <br/>
                            <label for="MicroSD" class="control-label"> {{'MicroSD'}}</label>
                            <select name="MicroSD" id="inputMicroSD" class="form-control">
                                <option value=""> -- Seleccione Opcion --</option>
                                <option value="Si"> Si </option>
                                <option value="No"> No</option>
                            </select>
                            <br/>

                            <label for="Lector_Huella" class="control-label"> {{'Lector_Huella'}}</label>
                            <select name="Lector_Huella" class="form-control" id="Lector_Huella" >
                                <option value=""> -- Seleccione Opcion --</option>
                                <option value="Si"> Si </option>
                                <option value="No"> No </option>
                            </select>
                            <br/>

                            <label for="SistemaOperativo" class="control-label"> {{'SistemaOperativo'}}</label>
                            <select name="SistemaOperativo" class="form-control" id="MicroSD" >
                                <option value=""> -- Seleccione Opcion --</option>
                                <option value="Si"> Android </option>
                                <option value="No"> IOS </option>
                            </select>
                            <br/>
                            <label for="Ram" class="control-label"> {{'Ram'}}</label>
                            <input type="text" class="form-control {{$errors->has('Ram') ? 'is-invalid' :'' }}" name="Ram" id="Ram" >
                            <br/>
                            <label for="Almacenamiento" class="control-label"> {{'Almacenamiento'}}</label>
                            <input type="text" class="form-control {{$errors->has('Almacenamiento') ? 'is-invalid' :'' }}" name="Almacenamiento" id="Almacenamiento">
                            <br/>
                            <label for="Procesador" class="control-label"> {{'Procesador'}}</label>
                            <input type="text" class="form-control {{$errors->has('Procesador') ? 'is-invalid' :'' }}" name="Procesador" id="Procesador" >
                            <br/>
                            <label for="Descripcion" class="control-label"> {{'Descripcion'}}</label>
                            <input type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' :'' }}" name="Descripcion" id="Descripcion">
                            <br/>





                            {!! $errors->first('Modelo','<div class="invalid-feedback"> :message</div>') !!}

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

    </form>


    <!– Esta es la pantilla  –>
    <form action ='{{ url('Tipo_Reparacion') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade" id="Tipo_Reparacion" tabindex="-1" role="dialog" aria-labelledby="Tipo_Reparacion" aria-hidden="true">
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
                            <label for="Descripcion" class="control-label"> {{'Tipo Reparacion'}}</label>
                            <textarea type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' :'' }}" name="Descripcion" id="Descripcion" >
                            </textarea>
                            {!! $errors->first('Tipo_Reparacion','<div class="invalid-feedback"> :message</div>') !!}

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

    </form>

@endsection












