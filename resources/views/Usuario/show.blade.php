@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

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
                                    <th> Nombre </th><td> {{ $Usuario->Nombre }} </td>
                                </tr>

                                <tr>
                                    <th> Apellido </th><td> {{ $Usuario->Apellido }} </td>
                                </tr>

                                <tr>
                                    <th> Telefono </th><td> {{ $Usuario->Telefono }} </td>
                                </tr>

                                <tr>
                                    <th> Direccion </th><td> {{ $Usuario->Direccion }} </td>
                                </tr>

                                <tr>
                                    <th> Tipo Usuario </th><td> {{ $Usuario->Tipo_Usuario }} </td>
                                </tr>

                                <tr>
                                    @foreach($Lugar as $Lugar )
                                        <th> Lugar </th><td value="{{$Lugar['id']}} ">   {{$Lugar['Lugar']}} </td>
                                    @endforeach
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
