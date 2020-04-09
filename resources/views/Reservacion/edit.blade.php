
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Reservacion
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Reservacion.update', $Reservacion->id) }}" method="post">
                            @method('PUT')
                            @csrf


                            <div class="form-group">
                                <label for="Fecha_Reserva" class="control-label"> {{'Fecha Reservado'}}</label>
                                <input type="text" class="form-control" name="Fecha_Reserva" required id="Fecha_Reserva" value=" {{$Reservacion->Fecha_Reserva}}">
                                <br/>

                                <label for="Fecha_Entrega" class="control-label"> {{'Fecha Entregado'}}</label>
                                <input type="text" class="form-control" name="Fecha_Entrega" id="Fecha_Entrega" value=" {{old('Fecha_Entrega', date('Y-m-d H:i:s'))}}">
                                <br/>

                                <label for="Estado" class="control-label"> {{'Estado'}}</label>
                                <select name="Estado" class="form-control" id="Estado" value="{{$Reservacion->Estado}}">
                                    <option value="Entregado"> Entregado </option>
                                    <option value="No Entregado"> No Entregado </option>


                                </select>
                                <br/>

                                <label for="Tipo_Reservacion" class="control-label"> {{'Tipo de Reservacion'}}</label>
                                <input type="text" class="form-control" name="Tipo_Reservacion" id="Tipo_Reservacion" value="{{$Reservacion->Tipo_Reservacion}}">
                                <br/>


                                <label for="Cantidad" class="control-label"> {{'Cantidad'}}</label>
                                <input type="text" class="form-control" name="Cantidad" id="Cantidad" value="{{$Reservacion->Cantidad}}">
                                <br/>

                                <label for="productos_id" class="control-label"> {{'Producto'}}</label>
                                <input type="text" class="form-control " name="productos_id" id="productos_id" value="{{$Reservacion->productos_id}}">
                                <br/>

                                <label for="tipo_reparacions_id" class="control-label"> {{'Tipo Reparacion'}}</label>
                                <input type="text" class="form-control " name="tipo_reparacions_id" id="tipo_reparacions_id" value="{{$Reservacion->tipo_reparacions_id}}">
                                <br/>

                                <div class="justify-content-end">
                                <input type="submit" value="Modificar" class="btn btn-success">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
