
<form action="{{ url('/Modelo/' . $Modelo->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Modelo.form',['Modo'=>'editar'])


</form>


