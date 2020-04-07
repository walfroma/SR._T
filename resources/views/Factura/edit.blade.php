

<form action="{{ url('/Factura/' . $Lugar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Factura.form',['Modo'=>'editar'])


</form>

