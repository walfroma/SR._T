
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9" >
                <div class="card">
                    <div class="card-header">Telefono</div>
                    <div class="card-body">

                        <a href="{{ url('Modelo/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2" title="Crear Modelo">
                            Agregar Modelo</a>

                        <form method="GET" action="{{ url('/Modelo') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th  >Modelo</th>
                                    <th>Marca</th>
                                    <th  >resolucion</th>
                                    <th  >Cam_Tras</th>
                                    <th  >Cam_Front</th>
                                    <th  >MicroSD</th>
                                    <th  >Lector_Huella</th>
                                    <th  >SistemaOperativo</th>
                                    <th  >Ram</th>
                                    <th  >Almacenamiento</th>
                                    <th  >Descripcion</th>
                                    <th  >Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Modelo as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $item->Modelo }}</td>
                                        <td>{{ $item->marcas_id }}</td>
                                        <td >{{ $item->resolucion }}</td>
                                        <td >{{ $item->Cam_Tras }}</td>
                                        <td >{{ $item->Cam_Front }}</td>
                                        <td >{{ $item->MicroSD }}</td>
                                        <td >{{ $item->Lector_Huella }}</td>
                                        <td >{{ $item->SistemaOperativo }}</td>
                                        <td >{{ $item->Ram }}</td>
                                        <td >{{ $item->Almacenamiento }}</td>
                                        <td >{{ $item->Descripcion }}</td>




                                        <td>
                                            <div class="form-inline my-2 my-lg-0 float-right">
                                                <div class="input-group">
                                                    <a href="{{ url('/Modelo/' . $item->id) }}" title="Vista Modelo" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-2" > <i aria-hidden="true"></i>  Vista </button> </a>

                                                    <a href="{{ url('/Modelo/' . $item->id . '/edit') }}" title="Editar Modelo"> <button class="btn btn-warning btn-smn mr-sm-2 mt-2"> <i aria-hidden="true"></i>  Editar </button></a>


                                                    <form method="POST" action="{{ url('/Modelo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btm-smn mt-2" title="Eliminar Modelo" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Modelo->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
