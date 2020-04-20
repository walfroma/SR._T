@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">


                        {{Form::open(array('url' => 'Factura', 'method' => 'POST', 'autocomplete' => 'off'))}}
                        {{Form::token()}}
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
                            <label for="Fecha" class="control-label float-right"> {{'Fecha'}}</label>
                            <input type="text" class="form-control float-right " name="Fecha" id="Fecha" value="{{old('Fecha', date('Y-m-d H:i:s'))}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Negocio" class="control-label float-right"> {{'Negocio'}}</label>
                                <select name="negocios_id" id="negocios_id" class="form-control" value="{{ isset($Negocio->negocios_id)? $Negocio->negocios_id:''}}">
                                    <option class="form-inline justify-content-center" > Seleccione Usuario </option>

                                    @foreach($Negocio as $Negocio )


                                        <option value="{{$Negocio['id']}} "> {{$Negocio['Negocio']}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="">Cliente <a class="btn btn-success btn-sm   d-block mx-auto float-right"   data-toggle="modal" data-target="#Cliente">Agregar Cliente</a></label>
                                <select name="usuarios_id" id="usuarios_id" class="form-control">
                                    <option class="form-inline justify-content-center" > Seleccione Cliente </option>
                                    @foreach($Usuario as $Usuario )
                                        <option value="{{$Usuario['id']}}_{{$Usuario->Direccion}} ">{{$Usuario['id']}} / {{$Usuario['Nombre']}} {{$Usuario['Apellido']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-1">
                                <label for="Lugar" class="control-label"> {{'Direccion'}}</label>
                                <input type="text" class="form-control " name="Direccion" id="Direccion" value="" readonly>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col mt-1 col-md-auto">
                                <label for="productos_id" class="">Producto </label>
                                <br/>
                                <select name="productos_id" id="productos_id" class="form-control col-md-auto" data-Live-search="true" >
                                    <option class="form-inline justify-content-center "  > Seleccione Producto  </option>
                                    @foreach($productos as $productos )
                                        <option value="{{$productos ->id}}_{{$productos->Stock}}_{{$productos->Precio}} ">{{$productos->Marca}} / {{$productos->Modelo}} /  {{$productos->Descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col ">
                                <label for="Stock" class="control-label"> {{'Stock'}}</label>
                                <input type="text" class="form-control " name="Stock" id="Stock" value="" readonly>
                            </div>
                            <div class="col mt-1">
                                <label for="inputPassword4">Precio Venta</label>
                                <input type="text" class="form-control"  name="Precio" id="Precio"  >
                            </div>
                            <div class="col mt-1">
                                <label for="inputPassword4">Descuento</label>
                                <input type="text" class="form-control" id="Descuento" name="Descuento" placeholder="Descuento">
                            </div>
                            <div class="col mt-1">
                                <label for="Cantidad">Cantidad</label>
                                <input type="text" class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad">
                            </div>
                        </div>
                        <br/>
                        <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 d-block mx-auto float-right">
                            <div class="form-group">
                                <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead class="thead-light" style="background-color: #A9D0F5">
                                <tr>
                                    <th  class=" form-inline justify-content-center" >Borrar</th>


                                    <th  >Producto / Servicio</th>
                                    <th  >Cantidad</th>
                                    <th  >Precio c/u</th>
                                    <th  >Descuento</th>
                                    <th  >Subtotal</th>

                                </tr>
                                </thead>
                                <tfoot>

                                <th>Total</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th><h4 id="Subtotal">Q 0.00</h4> <input type="text" name="Total" id="Total"></th>
                                </tfoot>
                            </table>

                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="guardar">
                            <div class="form-group">
                                <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
                                <input type="submit" class="btn btn-success" value="Guardar">

                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>




            </div>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}

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
                                <a href="{{'/Especificaciones/create'}}"><input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="Agregar"></a>
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

    <script type="text/javascript">

        $("#negocios_id").select2();

        $("#usuarios_id").select2();

        $("#productos_id").select2();

        $(document).ready(function(){

            $('#bt_add').click(function(){
                agregar();

            })
            mostrarValores();

        });

        //variables
        var cont =0;
        Total = 0;
        Subtotal=[];
        $('#guardar').hide();

        //cada vez que se cambie el articulo se ejecuta
        $('#productos_id').change(mostrarValores);
        $('#usuarios_id').change(mostrarValores);

        function mostrarValores(){
            datosArticulo = document.getElementById('productos_id').value.split('_');
            $('#Precio').val(datosArticulo[2]);
            $('#Stock').val(datosArticulo[1]);

            datosCliente = document.getElementById('usuarios_id').value.split('_');
            $('#Direccion').val(datosCliente[1]);


        }

        function agregar(){

            datosArticulo = document.getElementById('productos_id').value.split('_');

            productos_id = datosArticulo[0];
            productos_id = $('#productos_id option:selected').text();
            Cantidad = $('#Cantidad').val();
            Precio = $('#Precio').val();
            Descuento = $('#Descuento').val();
            Stock = $('#Stock').val();


            if(productos_id != "" && Cantidad != "" && Cantidad > 0 && Precio != "" && Descuento != "" )
            {

                if(Stock >= Cantidad)
                {
                    Subtotal[cont] = (Cantidad * Precio - Descuento);
                    Total = Total + Subtotal[cont];

                    var fila = '<tr class="selected" id="fila'+cont+'"><td><button class="btn btn-danger" type="button" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="productos_id[]" value="'+productos_id+'">'+/*   */productos_id+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="Precio[]" value="'+Precio+'" ></td><td><input type="number" name="Descuento[]" value="'+Descuento+'"></td><td>'+Subtotal[cont]+'</td></tr>';

                    //aumentar el contador
                    cont++;

                    //limpiar los controles
                    limpiar();

                    //indicar el subtotal
                    $('#Subtotal').html('Q '+Subtotal);
                    $('#Total').val(Total);
                    //mostrar los botones de guardar y cancelar
                    evaluar();

                    //agregar la fila a la tabla
                    $('#detalles').append(fila);

                    Cantidad=0;
                    Stock=0;
                    Precio=$('#Precio').val();

                }
                else
                {
                    alert('La cantidad a vender supera el stock de: ' + Stock );
                }
            }
            else
            {
                alert('Error al ingresar la venta, revise los datos del articulo');
            }

        }


        function limpiar(){
            $('#Cantidad').val('');

            $('#Descuento').val('');

        }

        function evaluar(){
            if (Total > 0)
            {
                $('#guardar').show();
            }
            else
            {
                $('#guardar').hide();
            }
        }

        function eliminar(index){
            Total = Total- Subtotal[index];
            $('#Subtotal').html('Q '+Total);
            $('#Total').val(Total);
            $('#fila' + index).remove();
            evaluar();
        }



    </script>

@endsection
