


<form action="{{ url('/Lugar/' . $Lugar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Lugar.form',['Modo'=>'editar'])


</form>
