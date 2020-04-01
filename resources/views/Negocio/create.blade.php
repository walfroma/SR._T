
<form action ='{{ url('Negocio') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Negocio.form',['Modo'=>'crear'])




</form>
