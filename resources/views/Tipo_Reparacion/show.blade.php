@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">Tipo Reparacion</div>
                    <div class="card-body">

                        <a href="{{ url('/Tipo_Reparacion') }}" title="Back"><button class="btn btn-primary btn-smn"> Regresar </button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>No.</th><td>{{ $Tipo_Reparacion->id }}</td>
                                </tr>

                                <tr>
                                    <th> Tipo_Reparacion </th>
                                    <td> {{ $Tipo_Reparacion->Descripcion }} </td>
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
