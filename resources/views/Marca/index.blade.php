<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">


            <div class="col-md-auto " >
                <div class="card">
                    <div class="card-header">Marca</div>
                    <div class="card-body">
                        @can('Creacion de Modelo')
                        <a class="btn btn-primary float-left mr-sm-2" href=" {{ url('Modelo/create') }}">Regresar</a>
                        @endcan
                            @can('Creacion de Marca')
                        <a href="{{ url('Marca/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2" title="Crear  Marca">
                            Agregar Marca</a>
                            @endcan



                        <form method="GET" action="{{ url('/Marca') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th class=" " >No</th>
                                    <th class=""  > Marca</th>
                                    <th  class=" form-inline justify-content-center" >Actiones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Marca as $item)
                                    <tr >
                                        <td class=" " >{{ $loop->iteration }}</td>
                                        <td class=" " >{{ $item->Marca }}</td>
                                        <td>
                                            <div class="form-inline my-2 my-lg-0 ">
                                                <div class="input-group justify-content-center">
                                                    @can('Ver detalle de Marca')
                                                    <a href="{{ url('/Marca/' . $item->id) }}" title="Vista  Marca" > <button class="btn btn-info btn-smn form-control mr-sm-2 mt-1" > <i aria-hidden="true"></i>  Vista </button> </a>
                                                    @endcan
                                                    @can('Edicion de Marca')
                                                    <a href="{{ url('/Marca/' . $item->id . '/edit') }}" title="Editar  Marca"> <button class="btn btn-warning btn-smn mr-sm-2 mt-1"> <i aria-hidden="true"></i>  Editar </button></a>
                                                    @endcan
                                                    @can('Eliminar Marca')
                                                    <form method="POST" action="{{ url('/Marca' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <a> <button type="submit" class="btn btn-danger btm-sm  mt-1  " title="Eliminar Marca" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button> </a>

                                                    </form>
                                                        @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Marca->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
