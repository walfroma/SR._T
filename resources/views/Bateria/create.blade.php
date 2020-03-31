

<form action ='{{ url('Bateria') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Bateria.form',['Modo'=>'crear'])




</form>

