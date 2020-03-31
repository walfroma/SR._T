@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pantalla</div>
                    <div class="card-body">

                        <a href="{{ url('/Pantalla') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Pantalla->id }}</td>
                                </tr>

                                <tr>
                                    <th> Pantalla </th>
                                    <td> {{ $Pantalla->Pantalla }} </td>
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
