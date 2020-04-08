@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">Vista de Producto</div>
                    <div class="card-body">

                        <a href="{{ url('/Producto') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Producto->id }}</td>
                                </tr>

                                <tr>
                                    <th> Negocio </th><td> {{ $Producto->negocios_id }} </td>
                                </tr>

                                <tr>

                                    <th> Categoria </th><td>   {{ $Producto->Categoria}} </td>

                                </tr>

                                <tr>
                                    <th> Modelo </th><td> {{ $Producto->modelos_id }} </td>
                                </tr>

                                <tr>
                                    <th> Tipo de Reparacion </th><td> {{ $Producto->tipo_reparacion_id }} </td>
                                </tr>

                                <tr>
                                    <th> Descripcion </th><td> {{ $Producto->Descripcion }} </td>
                                </tr>
                                <tr>
                                    <th> Cantidad </th><td> {{ $Producto->Cantidad }} </td>
                                </tr>
                                <tr>
                                    <th> Precio </th><td> {{ $Producto->Precio }} </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
