
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Usuario</div>
                    <div class="card-body">

                        <a href="{{ url('/Usuario') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Usuario->id }}</td>
                                </tr>

                                <tr>
                                    <th> Nombre </th>
                                    <td> {{ $Usuario->name }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th>
                                    <td> {{ $Usuario->email }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th>
                                    <td> {{ $Usuario->Nombre }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th>
                                    <td> {{ $Usuario->Apellido }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th>
                                    <td> {{ $Usuario->Telefono }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th>
                                    <td> {{ $Usuario->Direccion }} </td>
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
