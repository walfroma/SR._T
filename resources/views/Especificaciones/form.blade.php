
@extends('layouts.app')

@section('content')

        <div class="container">

            <div class="row justify-content-center">


                <div class="col-md-auto">
                    <div class="card">
                        <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Especificaciones' : 'Modificar Especificaciones' }}</div>
                        <div class="card-body">



                            @if(count($errors)>0)
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}}</li>
                                    </ul>
                                    @endforeach
                                </div>
                            @endif



                            <div class="form-group">
                                <label for="lugars_id" class="control-label"> {{'Modelo'}}</label>
                                <select name="modelos_id" id="inputlugars_id" class="form-control" value="{{ isset($Modelo->modelos_id)? $Modelo->modelos_id:''}}">
                                    <option value=""> -- Seleccione Opcion --</option>
                                    @foreach($Modelo as $Modelo )

                                        <option value="{{$Modelo['id']}} "> {{$Modelo['Modelo']}} </option>
                                    @endforeach
                                </select>
                                <br/>

                                <label for="pantallas_id" class="control-label"> {{'Pantalla'}}</label>
                                <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#exampleModalCenter">Crear Pantalla</a>
                                <select name="pantallas_id" id="inputpantallas_id" class="form-control" value="{{ isset($Pantalla->pantallas_id)? $Pantalla->pantallas_id:''}}">
                                    <option value=""> -- Seleccione Opcion --</option>
                                    @foreach($Pantalla as $Pantalla )

                                        <option value="{{$Pantalla['id']}} "> {{$Pantalla['Pantalla']}} </option>
                                    @endforeach
                                </select>
                                <br/>

                                <label for="baterias_id" class="control-label"> {{'Bateria'}}</label>
                                <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Bateria">Crear Bateria</a>
                                <select name="baterias_id" id="inputbaterias_id" class="form-control" value="{{ isset($Bateria->baterias_id)? $Bateria->baterias_id:''}}">
                                    <option value=""> -- Seleccione Opcion --</option>
                                    @foreach($Bateria as $Bateria )

                                        <option value="{{$Bateria['id']}} "> {{$Bateria['Bateria']}} </option>
                                    @endforeach
                                </select>
                                <br/>








                                {!! $errors->first('Especificaciones','<div class="invalid-feedback"> :message</div>') !!}

                            </div>
                            <div class=" form-inline mb-2 mb-lg-0 col v-center">
                                <div class="input-group">
                                    <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                    <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Especificaciones') }}">Regrasar Especificaciones</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <!– Esta es la pantilla  –>
    <form action ='{{ url('Pantalla') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="Pantalla" class="control-label"> {{'Pantalla'}}</label>
                            <input type="text" class="form-control " name="Pantalla" id="Pantalla">

                            {!! $errors->first('Pantalla','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <a href="{{'/Especificaciones/create'}}"><input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}"></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>

    </form>



    <!– Esta es la Bateria  –>
    <form action ='{{ url('Bateria') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade" id="Bateria" tabindex="-1" role="dialog" aria-labelledby="Bateria" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Bateria">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="Bateria" class="control-label"> {{'Bateria'}}</label>
                            <input type="text" class="form-control " name="Bateria" id="Bateria">

                            {!! $errors->first('Bateria','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <a href="{{'/Especificaciones/create'}}"><input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}"></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>

    </form>




@endsection
