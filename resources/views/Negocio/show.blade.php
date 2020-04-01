@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Negocio</div>
                    <div class="card-body">

                        <a href="{{ url('/Negocio') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Negocio->id }}</td>
                                </tr>

                                <tr>
                                    <th> Negocio </th><td> {{ $Negocio->Negocio }} </td>
                                </tr>

                                <tr>
                                    <th> Telefono </th><td> {{ $Negocio->Telefono }} </td>
                                </tr>

                                <tr>
                                    <th> Direccion </th><td> {{ $Negocio->Direccion }} </td>
                                </tr>

                                <tr>
                                    <th> Ubicacion </th><td> {{ $Negocio->Ubicacion }} </td>
                                </tr>

                                <tr>
                                    <th> Correo </th><td> {{ $Negocio->Correo }} </td>
                                </tr>

                                <tr>


                                        <th> Usuario </th><td> {{$Usuario}} </td>

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
