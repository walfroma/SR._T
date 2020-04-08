@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Cargar Factura' : 'Modificar Factura' }}</div>
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
                            <div class="form-row">
                            <div class="form-group col-md-5">

                            </div>
                            </div>
                            <div class="form-group col-md-auto float-right">
                                <label for="Lugar" class="control-label float-right"> {{'Fecha'}}</label>
                                <input type="text" class="form-control float-right " name="Lugar" id="Lugar" value="">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Lugar" class="control-label"> {{'Nombre del Negocio'}}</label>
                                    <input type="text" class="form-control " name="Lugar" id="Lugar" value="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4" class="">Cliente <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Cliente">Agregar Cliente</a></label>

                                    <input type="text" class="form-control  "  id="inputEmail4" placeholder="Nombre del Cliente">
                                </div>
                                <div class="col mt-1">
                                    <label for="Lugar" class="control-label"> {{'Direccion'}}</label>
                                    <input type="text" class="form-control " name="Lugar" id="Lugar" value="">
                                </div>
                                <div class="col mt-1">
                                    <label for="inputPassword4">NIT</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="No. Nit">
                                </div>
                            </div>
                            <br/>

                            <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Factura">Agregar Producto</a>
                            <br/>
                            <br/>

                            <div class="table-responsive">
                                <table class="table table-light table-hover">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th  >Cantidad</th>
                                        <th  >Producto / Servicio</th>
                                        <th  >Precio c/u</th>
                                        <th  >Subtotal</th>
                                        <th  class=" form-inline justify-content-center" >Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>f</td>
                                            <td>f</td>
                                            <td>f</td>
                                            <td>f</td>
                                            <td>f</td>

                                            <td >
                                                <div class="form-inline my-2 my-lg-0 justify-content-center">
                                                    <div class="input-group">
                                                        @can('Eliminar Factura')
                                                            <form method="POST" action="{{ url('/Lugar') }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <a> <button type="submit" class="btn btn-danger btm-sm mt-1  " title="Eliminar Lugar" onclick="return confirm('¿Desea_Borrar_el_Dato?');"> <i  aria-hidden="true"></i>Borrar</button> </a>
                                                                @endcan
                                                            </form>
                                                    </div>
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                            <div class="form-group col-md-auto float-right">
                                <label for="Lugar" class="control-label float-right"> {{'Descuento'}}</label>
                                <input type="text" class="form-control float-right " name="Lugar" id="Lugar" value="">
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <br/>


                            <div class="form-group col-md-auto float-right">
                                <label for="Lugar" class="control-label float-right"> {{'Total'}}</label>
                                <input type="text" class="form-control float-right " name="Lugar" id="Lugar" value="">
                            </div>


                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Producto') }}">Regrasar Producto</a>
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


        <div class="modal fade" id="Cliente" tabindex="-1" role="dialog" aria-labelledby="Cliente" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
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


    <!– Esta es la Producto  –>
    <form action ='{{ url('Factura') }}' class="form-horizontal"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="modal fade " id="Factura" tabindex="-1"  role="dialog" aria-labelledby="Factura" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered "  role="document">

                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Bateria">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">


                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4" class="">Producto </label>

                                    <input type="text" class="form-control  "  id="inputEmail4" placeholder="Nombre del Producto">
                                </div>
                                <div class="col mt-1">
                                    <label for="Lugar" class="control-label"> {{'Cantidad'}}</label>
                                    <input type="text" class="form-control " name="Lugar" id="Lugar" value="">
                                </div>
                            </div>

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
