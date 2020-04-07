
<form action ='{{ url('Factura') }}' class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('Factura.form',['Modo'=>'crear'])




</form>
