
<form action="{{ url('/Usuario/' . $Usuario->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('Usuario.form',['Modo'=>'editar'])


</form>


