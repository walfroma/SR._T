
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto" >
                <div class="card">
                    <div class="card-header">Negocio</div>
                    <div class="card-body">
                        @can('Creacion de Negocio')
                        <a href="{{ url('Negocio/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2 my-2 my-lg-0" title="Crear Negocio">
                            Agregar Negocio</a>
                        @endcan

                        <form method="GET" action="{{ url('/Negocio') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th  >Negocio</th>
                                    <th  >Telelfono</th>
                                    <th  >Direccion</th>
                                    <th  >Ubicacion</th>
                                    <th  >Correo</th>
                                    <th   class=" form-inline justify-content-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Negocio as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $item->usuarios_id }}</td>
                                        <td >{{ $item->Negocio }}</td>
                                        <td >{{ $item->Telefono }}</td>
                                        <td >{{ $item->Direccion }}</td>
                                        <td >{{ $item->Ubicacion }}</td>
                                        <td >{{ $item->Correo }}</td>


                                        <td>
                                            <div class="form-inline my-2 my-lg-0 justify-content-center">
                                                <div class="input-group">
                                                    @can('Ver detalle de Negocio')
                                                    <a href="{{ url('/Negocio/' . $item->id) }}" title="Vista Negocio" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-2" > <i aria-hidden="true"></i>  Vista </button> </a>
                                                    @endcan
                                                    @can('Edicion de Negocio')
                                                    <a href="{{ url('/Negocio/' . $item->id . '/edit') }}" title="Editar Negocio"> <button class="btn btn-warning btn-smn mr-sm-2 mt-2"> <i aria-hidden="true"></i>  Editar </button></a>
                                                        @endcan
                                                        @can('Eliminar Negocio')

                                                    <form method="POST" action="{{ url('/Negocio' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btm-smn mt-2" title="Eliminar Negocio" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button>
                                                    </form>
                                                        @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Negocio->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
