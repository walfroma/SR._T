


<form action ='{{ url('Marca') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Marca.form',['Modo'=>'crear'])




</form>
