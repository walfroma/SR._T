
<form action="{{ url('/Especificaciones/' . $Especificaciones->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Especificaciones.form',['Modo'=>'editar'])


</form>


