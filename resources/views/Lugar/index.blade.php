

@extends('layouts.app')

@section('content')

    <div class="container">

@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
    </div>

@endif

<a href=" {{ url('Lugar/create') }}"  class="btn btn-success">Agregar Lugar</a>
    <br/>
    <br/>

<table class="table table-light table-hover">

    <thead class="thead-light">

        <tr>
            <th>No.</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>
    @foreach($Lugar as $Lugar)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$Lugar->Lugar}}</td>
            <td>


                <a class="btn btn-warning" href="{{ url('/Lugar/'.$Lugar->id.'/edit') }}">
                    Editar
                </a>




                <form method="post" action="{{ url('/Lugar/'.$Lugar->id) }}" style="display:inline">


                    |

                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea_Borrar_el_Dato?');">Borrar</button>

                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
