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
        //
        $Factura = Factura::all();
        $Detalle_Venta = DetalleVenta::all();
        $Negocio = Negocio::all();
        $Usuario = User::all();
        $productos = DB::table('productos as p')
            ->select(DB::raw('CONCAT (p.id, " - " , p.modelos_id) as productos'), 'p.id', 'p.modelos_id', 'p.Stock', 'p.Precio')
            ->where ('p.estado', '=', 'Activo')
            ->where('p.Stock', '>', '0')
            ->get();
        $Modelo = Modelo::all();
        return view('Factura.create', ['productos' => $productos], compact('Factura', 'Negocio', 'Usuario', 'Detalle_Venta', 'productos', 'Modelo'));
    }




public function store(Request $request)
    {
       try{
           DB::biginTransaction();

           $venta = new Factura()


       }
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
