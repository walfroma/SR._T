
<form action="{{ url('/Negocio/' . $Negocio->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Negocio.form',['Modo'=>'editar'])


</form>


