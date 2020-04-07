
<form action ='{{ url('Producto') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Producto.form',['Modo'=>'crear'])




</form>

