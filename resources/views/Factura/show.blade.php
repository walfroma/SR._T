
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3>Nueva venta</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    {{Form::open(array('url' => 'show', 'method' => 'POST', 'autocomplete' => 'off'))}}
    {{Form::token()}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="nombre">Cliente:</label>
                <select name="id_cliente" id="id_cliente" class="form-control selectpicker" data-Live-search="true">

                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="nombre">Tipo de comprobante:</label>
                <select name="tipo_comprobante" id="" class="form-control selectpicker">
                    <option value="Boleta">Boleta</option>
                    <option value="Factura">Factura</option>
                    <option value="Ticket">Ticket</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="codigo">Serie del comprobante:</label>
                <input type="text" class="form-control" name="serie_comprobante" placeholder="Serie del comprobante..."  value="{{old('serie_comprobante')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="codigo">Numero del comprobante:</label>
                <input type="text" class="form-control" name="num_comprobante" placeholder="Numero del comprobante..."  required value="{{old('num_comprobante')}}">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">Articulo</label>
                        <select class="form-control selectpicker" name="pid_articulo" id="pid_articulo" data-Live-search="true">

                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    <div class="form-group">
                        <label for="cantidad">Stock:</label>
                        <input type="number" class="form-control" name="pstock" id="pstock"  readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Precio de venta:</label>
                        <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta"readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Descuento:</label>
                        <input type="number" class="form-control" name="pdescuento" id="pdescuento" placeholder="Descuento...">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="cantidad">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #A9D0F5">
                        <th>Opciones</th>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Precio venta</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                        </thead>
                        <tfoot>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">S/. 0.00</h4> <input type="text" name="total_venta" id="total_venta"></th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="guardar">
            <div class="form-group">
                <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}


