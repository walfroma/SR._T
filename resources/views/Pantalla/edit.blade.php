


<form action="{{ url('/Pantalla/' . $Pantalla->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Pantalla.form',['Modo'=>'editar'])


</form>


