

<form action="{{ url('/Tipo_Reparacion/' . $TipoReparacion->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Tipo_Reparacion.form',['Modo'=>'editar'])


</form>


