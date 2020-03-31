
<form action="{{ url('/Marca/' . $Marca->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Marca.form',['Modo'=>'editar'])


</form>


