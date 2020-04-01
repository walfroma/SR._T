
<form action ='{{ url('Modelo') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Modelo.form',['Modo'=>'crear'])




</form>
