
<form action ='{{ url('Usuario') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Usuario.form',['Modo'=>'crearUsuario'])




</form>


