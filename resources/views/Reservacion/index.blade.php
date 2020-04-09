@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto " >
                <div class="card">
                    <div class="card-header">Reservaciones</div>
                    <div class="card-body">
                        @can('Creacion de Reservacion')
                            <a href="{{ url('Reservacion/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2 my-2 my-lg-0" title="Crear Reservacion">
                                Agregar Reservacion</a>
                        @endcan

                        <form method="GET" action="{{ url('/Reservacion') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search..." value="{{ request('search') }}" aria-label="Search">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-success mr-sm-2" type="submit">
                                       Buscar
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                        @if(Session::has('Mensaje'))
                            <div class="alert alert-success close d-block mx-auto" style="font-size: 100% " data-dismiss="alert">

                                {{Session::get('Mensaje')}} &times

                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Reservacion</th>
                                    <th  >Entrega</th>
                                    <th  >Estado</th>
                                    <th  >Reservacion</th>
                                    <th  >Cantidad</th>
                                    <th  >Producto</th>
                                    <th  >Reparacion</th>
                                    <th   class=" form-inline justify-content-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Reservacion as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Fecha_Reserva }}</td>
                                        <td >{{ $item->Fecha_Entrega }}</td>
                                        <td >{{ $item->Estado }}</td>
                                        <td >{{ $item->Tipo_Reservacion }}</td>
                                        <td >{{ $item->Cantidad }}</td>
                                        <td >{{ $item->productos_id }}</td>
                                        <td >{{ $item->tipo_reparacions_id }}</td>

                                        <td>
                                            <div class="form-inline my-2 my-lg-0 ">
                                                <div class="input-group justify-content-center">
                                                    @can('Ver detalle de Reservacion')
                                                        <a href="{{ url('/Reservacion/' . $item->id) }}" title="Vista Reservacion" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-2 " > <i aria-hidden="true"></i>  Vista </button> </a>
                                                    @endcan
                                                    @can('Edicion de Reservacion')
                                                        <a href="{{ url('/Reservacion/' . $item->id . '/edit') }}" title="Editar Reservacion"> <button class="btn btn-warning btn-smn mr-sm-2 mt-2"> <i aria-hidden="true"></i>  Editar </button></a>
                                                    @endcan
                                                    @can('Eliminar Reservacion')

                                                        <form method="POST" action="{{ url('/Reservacion' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btm-smn mt-2" title="Eliminar Reservacion" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button>

                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Reservacion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

