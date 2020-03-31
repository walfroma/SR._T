

<form action ='{{ url('Pantalla') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Pantalla.form',['Modo'=>'crear'])




</form>
