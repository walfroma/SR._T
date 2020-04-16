
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-auto" >
                <div class="card">
                    <div class="card-header">Usuario</div>
                    <div class="card-body">
                            @can('Creacion de usuarios')
                                <a href="{{ url('Usuario/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2" title="Crear Usuario">
                                    Agregar Usuario</a>
                            @endcan



                            <form method="GET" action="{{ url('/Usuario') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th  >Usuario</th>
                                        <th  >Email</th>
                                        <th  >Nombres</th>
                                        <th  >Apellidos</th>
                                        <th  >Telefono</th>
                                        <th  >Direccion</th>
                                        <th  >Rol</th>
                                        <th  >Actiones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Usuario as $item)
                                        <tr >
                                            <td>{{ $loop->iteration }}</td>
                                            <td >{{ $item->name }}</td>
                                            <td >{{ $item->email }}</td>
                                            <td >{{ $item->Nombre }}</td>
                                            <td >{{ $item->Apellido }}</td>
                                            <td >{{ $item->Telefono }}</td>
                                            <td >{{ $item->Direccion }}</td>
                                            <td >{{ $item->roles->implode('name',',') }}</td>
                                            <td>
                                                <div class="form-inline my-2 my-lg-0 ">
                                                    <div class="input-group justify-content-center">
                                                        @can('Ver detalle de usuario')
                                                            <a href="{{ url('/Usuario/' . $item->id) }}" title="Vista Lugar" > <button class="btn btn-info btn-smn form-control mr-sm-3 mt-1" > <i aria-hidden="true"></i>  Vista </button> </a>
                                                        @endcan
                                                        @can('Edicion de usuarios')
                                                            <a href="{{ url('/Usuario/' . $item->id . '/edit') }}" title="Editar Lugar"> <button class="btn btn-warning btn-smn mr-sm-3 mt-1"> <i aria-hidden="true"></i>  Editar </button></a>
                                                        @endcan

                                                        <form method="POST" action="{{ url('/Usuario' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            @can('Eliminar usuario')
                                                                <a> <button type="submit" class="btn btn-danger btm-sm  mt-1 " title="Eliminar Lugar" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button> </a>
                                                            @endcan
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> {!! $Usuario->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
