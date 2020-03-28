

{{ $Modo == 'crear' ? 'Agregar Lugar' : 'Modificar Lugar' }}
<label for="Lugar"> {{'Lugar'}}</label>
<input type="text" name="Lugar" id="Lugar" value="{{ isset($Lugar->Lugar)? $Lugar->Lugar:''}}">
<br/>

<input type="submit" value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

<a href=" {{ url('Lugar') }}">Regrasar Lugar</a>
