
<form action="{{ url('/Producto/' . $Producto->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Producto.form',['Modo'=>'editar'])


</form>


