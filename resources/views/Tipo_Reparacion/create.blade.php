

<form action ='{{ url('Tipo_Reparacion') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Tipo_Reparacion.form',['Modo'=>'crear'])




</form>
