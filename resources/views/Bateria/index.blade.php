<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9" >
                <div class="card">
                    <div class="card-header">Bateria</div>
                    <div class="card-body">


                        <a href="{{ url('Bateria/create') }}" class="btn btn-success btn-smn  float-left mr-sm-2" title="Crear tamaño de Bateria">
                            Agregar tamaño de Bateria</a>



                        <form method="GET" action="{{ url('/Bateria') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th  >Tamaño de Bateria</th>
                                    <th  >Actiones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Bateria as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $item->Bateria }}</td>
                                        <td>
                                            <div class="form-inline my-2 my-lg-0 float-right">
                                                <div class="input-group">
                                                    <a href="{{ url('/Bateria/' . $item->id) }}" title="Vista del tamaño de la Bateria" > <button class="btn btn-info btn-smn form-control mr-sm-3" > <i aria-hidden="true"></i>  Vista </button> </a>

                                                    <a href="{{ url('/Bateria/' . $item->id . '/edit') }}" title="Editar tamaño de la Bateria"> <button class="btn btn-warning btn-smn mr-sm-3"> <i aria-hidden="true"></i>  Editar </button></a>


                                                    <form method="POST" action="{{ url('/Bateria' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <a> <button type="submit" class="btn btn-danger btm-sm   " title="Eliminar Bateria" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button> </a>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Bateria->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
