<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-auto" >
                <div class="card">
                    <div class="card-header">Pantalla</div>
                    <div class="card-body">
                        <div>
                        @can('Creacion de Pantalla')
                        <a href="{{ url('Pantalla/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2 my-2 my-lg-0 " title="Crear tamaño de Pantalla">
                            Agregar Pantalla</a>
                                <a href="{{ url('Especificaciones/create') }}" class="btn btn-info btn-smn  float-left mr-sm-2 my-2 my-lg-0 " title="Regresar Especificaciones">
                                    Regresar Especificaciones</a>
                        @endcan


                        <form method="GET" action="{{ url('/Pantalla') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search..." value="{{ request('search') }}" aria-label="Search">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-success mr-sm-2" type="submit">
                                       Buscar
                                    </button>
                                </span>
                            </div>
                        </form>
                        </div>
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
                                    <th  >Tamaño de Pantalla</th>
                                    <th  class=" form-inline justify-content-center" >Actiones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Pantalla as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $item->Pantalla }}</td>
                                        <td>
                                            <div class="form-inline my-2 my-lg-0 ">
                                                <div class="input-group justify-content-center">
                                                    @can('Ver detalle de Pantalla')
                                                    <a href="{{ url('/Pantalla/' . $item->id) }}" title="Vista del tamaño de la Pantalla" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-1" > <i aria-hidden="true"></i>  Vista </button> </a>
                                                    @endcan
                                                    @can('Edicion de Pantalla')
                                                    <a href="{{ url('/Pantalla/' . $item->id . '/edit') }}" title="Editar tamaño de la Pantalla"> <button class="btn btn-warning btn-smn mr-sm-2 mt-1"> <i aria-hidden="true"></i>  Editar </button></a>
                                                        @endcan
                                                        @can('Eliminar Pantalla')
                                                    <form method="POST" action="{{ url('/Pantalla' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <a> <button type="submit" class="btn btn-danger btm-sm  mt-1  " title="Eliminar Pantalla" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button> </a>

                                                    </form>
                                                        @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Pantalla->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
