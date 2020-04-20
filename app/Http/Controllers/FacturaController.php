<?php

namespace App\Http\Controllers;

use App\DetalleVenta;
use App\Factura;
use App\Modelo;
use App\Negocio;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Response;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        //
        $keyword = $id->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $Factura = Factura::where('Factura', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Factura = Factura::latest()->paginate($perPage);

        }

        return view('Factura.index',  compact('Factura'));



    }


    public function create()
    {

        $Factura = Factura::all();
        $Detalle_Venta = DetalleVenta::all();
        $Negocio = Negocio::all();
        $Usuario = User::all();
        $productos = DB::table('productos as p', 'modelos ')
            ->join('modelos', 'modelos.id', '=', 'p.modelos_id' )
            ->join('marcas as m', 'm.id', '=', 'modelos.marcas_id')
            ->join('tipo_reparacions as t', 't.id', '=', 'p.tipo_reparacions_id' )
            ->select(DB::raw('CONCAT (p.id, " - " , p.modelos_id) as productos'), 'p.id', 'm.Marca', 'modelos.Modelo', 't.Descripcion', 'p.Stock', 'p.Precio')
            ->where ('p.estado', '=', 'Activo')
            ->where('p.Stock', '>', '0')
            ->get();
        $Modelo = Modelo::all();
        return view('Factura.create', ['productos' => $productos], compact('Factura', 'Negocio', 'Usuario', 'Detalle_Venta', 'productos', 'Modelo'));
    }

public function store(Request $request)
    {
       try{
           DB::beginTransaction();

           $venta = new Factura();
           $venta -> users_id = $request -> get('users_id');
           $venta -> negocios_id = $request -> get('negocios_id');
           $venta -> Fecha = $request -> get('Fecha');
           $venta -> Descuento = $request -> get('Descuento');
           $venta -> Total = $request -> get('Total');
           $venta -> save();

           $Cantidad =$request-> get('Cantidad');
           $Precio = $request -> get('Precio');
           $productos_id = $request ->get('productos_id');
           $Subtotal = $request -> get('Subtotal');

           $cont = 0;

           while($cont < count($productos_id)){

               $detalle = new DetalleVenta();
               $detalle -> facturas_id = $venta -> facturas_id;
               $detalle -> productos_id = $productos_id[$cont];
               $detalle -> Cantidad = $Cantidad[$cont];
               $detalle -> Precio = $Precio[$cont];
               $detalle -> Subtotal = $Subtotal[$cont];
               $detalle -> save();

               $cont = $cont+1;
           }

           DB::commit();

       }catch (\Exception $e) {
           DB::rollback();
       }
       return Redirect::to('Factura');
    }


    public function show($id)
    {


        return view('Factura.show');

    }


    public function edit($id)
    {
        //
        $Factura = Factura::findOrFail($id);

        return view('Factura.edit',compact('Factura'));
    }


    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $Factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Factura::destroy($id);
        //return redirect('Factura');
        return redirect('Factura')->with('Mensaje','Factura eliminado con Exito');
    }
}
