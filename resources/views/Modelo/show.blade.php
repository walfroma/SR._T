@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vista de Telefono</div>
                    <div class="card-body">

                        <a href="{{ url('/Modelo') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Modelo->id }}</td>
                                </tr>

                                <tr>
                                    <th> Modelo </th><td> {{ $Modelo->Modelo }} </td>
                                </tr>

                                <tr>

                                        <th> Marca </th><td>   {{ $Modelo->marcas_id}} </td>

                                </tr>

                                <tr>
                                    <th> resolucion </th><td> {{ $Modelo->resolucion }} </td>
                                </tr>

                                <tr>
                                    <th> Cam_Tras </th><td> {{ $Modelo->Cam_Tras }} </td>
                                </tr>

                                <tr>
                                    <th> Cam_Front </th><td> {{ $Modelo->Cam_Front }} </td>
                                </tr>
                                <tr>
                                    <th> MicroSD </th><td> {{ $Modelo->MicroSD }} </td>
                                </tr>
                                <tr>
                                    <th> Lector_Huella </th><td> {{ $Modelo->Lector_Huella }} </td>
                                </tr>
                                <tr>
                                    <th> SistemaOperativo </th><td> {{ $Modelo->SistemaOperativo }} </td>
                                </tr>
                                <tr>
                                    <th> Ram </th><td> {{ $Modelo->Ram }} </td>
                                </tr>
                                <tr>
                                    <th> Almacenamiento </th><td> {{ $Modelo->Almacenamiento }} </td>
                                </tr>
                                <tr>
                                    <th> Descripcion </th><td> {{ $Modelo->Descripcion }} </td>
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
