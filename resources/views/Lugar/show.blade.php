@extends('layouts.app')

@section('content')
    @include('admin.sidebar')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">Lugar</div>
                    <div class="card-body">

                        <a href="{{ url('/Lugar') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Lugar->id }}</td>
                                </tr>

                                <tr>
                                    <th> Nombre </th>
                                    <td> {{ $Lugar->Lugar }} </td>
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
