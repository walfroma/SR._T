

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Lugar</div>
                    <div class="card-body">

                        <a href="{{ url('Lugar/create') }}" class="btn btn-success btn-sm" title="Crear Lugar">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Lugar</a>

                        @if(Session::has('Mensaje'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('Mensaje')}}
                            </div>
                        @endif

                        <form method="GET" action="{{ url('/Lugar') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Lugar</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Lugar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Lugar }}</td>
                                        <td>
                                            <a href="{{ url('/Lugar/' . $item->id) }}" title="Vista Lugar" class="btn btn-info btn-sm fa fa-eye" aria-hidden="true">  Vista</a>
                                            <a href="{{ url('/Lugar/' . $item->id . '/edit') }}" title="Editar Lugar" button class="btn btn-warning fa fa-trash-o" aria-hidden="true" > Editar</a>

                                            <form method="POST" action="{{ url('/Lugar' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm fa fa-trash-o" title="Delete Lugar" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $Lugar->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
