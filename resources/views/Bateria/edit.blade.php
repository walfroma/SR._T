

<form action="{{ url('/Bateria/' . $Bateria->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Bateria.form',['Modo'=>'editar'])


</form>


