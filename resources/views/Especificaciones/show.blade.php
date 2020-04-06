@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">Especificaciones</div>
                    <div class="card-body">

                        <a href="{{ url('/Especificaciones') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Especificaciones->id }}</td>
                                </tr>

                                <tr>
                                    @foreach($Modelo as $Modelo )
                                        <th> Modelo </th><td value="{{$Modelo['id']}} ">   {{$Modelo['Modelo']}} </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    @foreach($Pantalla as $Pantalla )
                                        <th> Pantalla </th><td value="{{$Pantalla['id']}} ">   {{$Pantalla['Pantalla']}} </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    @foreach($Bateria as $Bateria )
                                        <th> Bateria </th><td value="{{$Bateria['id']}} ">   {{$Bateria['Bateria']}} </td>
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
