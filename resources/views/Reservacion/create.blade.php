<form action ='{{ url('Reservacion') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Reservacion.form',['Modo'=>'crear'])




</form>
