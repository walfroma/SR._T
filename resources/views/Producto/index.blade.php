@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto " >
                <div class="card">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        @can('Creacion de Producto')
                            <a href="{{ url('Producto/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2 my-2 my-lg-0" title="Crear Producto">
                                Agregar Producto</a>
                        @endcan

                        <form method="GET" action="{{ url('/Producto') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th>Negocio</th>
                                    <th  >Categoria</th>
                                    <th  >Telefono</th>
                                    <th  >Tipo de Reparacion</th>
                                    <th  >Descripcion</th>
                                    <th  >Cantidad</th>
                                    <th  >Precio</th>
                                    <th  >Estado</th>
                                    <th   class=" form-inline justify-content-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Producto as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Negocio }}</td>
                                        <td >{{ $item->Categoria }}</td>
                                        <td >{{ $item->Modelo }}</td>
                                        <td >{{ $item->Descripcion }}</td>
                                        <td >{{ $item->Descripcion2 }}</td>
                                        <td >{{ $item->Stock }}</td>
                                        <td >Q{{ $item->Precio }}</td>
                                        <td >{{ $item->estado }}</td>

                                        <td>
                                            <div class="form-inline my-2 my-lg-0 ">
                                                <div class="input-group justify-content-center">
                                                    @can('Ver detalle de Producto')
                                                        <a href="{{ url('/Producto/' . $item->id) }}" title="Vista Producto" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-2" > <i aria-hidden="true"></i>  Vista </button> </a>
                                                    @endcan
                                                    @can('Edicion de Producto')
                                                        <a href="{{ url('/Producto/' . $item->id . '/edit') }}" title="Editar Producto"> <button class="btn btn-warning btn-smn mr-sm-2 mt-2"> <i aria-hidden="true"></i>  Editar </button></a>
                                                    @endcan
                                                    @can('Eliminar Producto')

                                                        <form method="POST" action="{{ url('/Producto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btm-smn mt-2" title="Eliminar Producto" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button>

                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Producto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
