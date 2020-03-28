<form action ='{{ url('Lugar') }}' method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('Lugar.form',['Modo'=>'crear'])


</form>
