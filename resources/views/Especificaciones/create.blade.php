
<form action ='{{ url('Especificaciones') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Especificaciones.form',['Modo'=>'crear'])




</form>


