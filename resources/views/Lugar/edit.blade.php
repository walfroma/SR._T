<form action="{{ url('/Lugar/'.$Lugar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <label for="Lugar"> {{'Lugar'}}</label>
    <input type="text" name="Lugar" id="Lugar" value="{{$Lugar->Lugar}}">
    <br/>

    <input type="submit" value="Editar">


</form>
