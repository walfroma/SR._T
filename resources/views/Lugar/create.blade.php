


<form action ='{{ url('Lugar') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('Lugar.form',['Modo'=>'crear'])


</form>


