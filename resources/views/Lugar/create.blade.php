<form action ='{{ url('Lugar') }}' method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="Lugar"> {{'Lugar'}}</label>
    <input type="text" name="Lugar" id="Lugar" value="">
    <br/>

    <input type="submit" value="Agregar">

</form>
