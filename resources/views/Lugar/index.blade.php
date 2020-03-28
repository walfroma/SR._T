
<table class="table table-light">

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

                <a href="{{ url('/Lugar/'.$Lugar->id.'/edit') }}">
                    Editar
                </a>


                |

                <form method="post" action="{{ url('/Lugar/'.$Lugar->id) }}">

                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('¿Desea_Borrar_el_Dato?');">Borrar</button>

                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
