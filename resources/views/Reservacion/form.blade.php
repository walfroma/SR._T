
@extends('layouts.app')

@section('content')

    <div class="container ">

        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Reservacion' : 'Modificar Reservacion' }}</div>
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

                            <label for="Fecha_Reserva" class="control-label"> {{'Fecha Reservado'}}</label>
                            <input type="text" class="form-control" name="Fecha_Reserva" required id="Fecha_Reserva" value="{{old('Fecha_Reserva', date('Y-m-d H:i:s'))}}">
                            <br/>

                            <label for="Fecha_Entrega" class="control-label"> {{'Fecha Entregado'}}</label>
                            <input type="text" class="form-control {{$errors->has('Fecha_Entrega') ? 'is-invalid' :'' }}" name="Fecha_Entrega" id="Fecha_Entrega" >
                            <br/>

                            <label for="Estado" class="control-label"> {{'Estado'}}</label>
                            <select name="Estado" class="form-control" id="Estado">
                                <option value="No Entregado"> No Entregado </option>
                                <option value="Entregado"> Entregado </option>

                            </select>
                            <br/>

                            <label for="Tipo_Reservacion" class="control-label"> {{'Tipo de Reservacion'}}</label>
                            <select name="Tipo_Reservacion" class="form-control" id="Tipo_Reservacion" >
                                <option value=""> -- Seleccione Opcion --</option>
                                <option value="Compra"> Compora de Telefono </option>
                                <option value="Reparacion"> Reparacion de Telefono </option>
                            </select>
                            <br/>

                            <label for="Cantidad" class="control-label"> {{'Cantidad'}}</label>
                            <input type="text" class="form-control {{$errors->has('Cantidad') ? 'is-invalid' :'' }}" name="Cantidad" id="Cantidad">
                            <br/>

                            <label for="productos_id" class="control-label"> {{'Producto'}}</label>
                            <select name="productos_id" id="productos_id" class="form-control" >
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Producto as $Producto )

                                    <option value="{{$Producto['id']}} "> {{$Producto['modelos_id']}} </option>
                                @endforeach
                            </select>
                            <br/>

                            <label for="tipo_reparacions_id" class="control-label"> {{'Tipo Reparacion'}}</label>
                            <select name="tipo_reparacions_id" id="tipo_reparacions_id" class="form-control">
                                <option> -- Seleccione Opcion --</option>
                                @foreach($Tipo_Reparacion as $Tipo_Reparacion )

                                    <option value="{{$Tipo_Reparacion['id']}} "> {{$Tipo_Reparacion['Descripcion']}} </option>
                                @endforeach
                            </select>
                            <br/>


                            {!! $errors->first('Reservacion','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Reservacion') }}">Regrasar Reservaciones</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection












