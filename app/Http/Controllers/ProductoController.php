<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Modelo;
use App\Negocio;
use App\Producto;
use App\TipoReparacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
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
            $Producto = DB::table('productos')
                ->join('negocios', 'negocios.id', '=', 'productos.negocios_id')
                ->join('modelos', 'modelos.id', '=', 'productos.modelos_id')
                ->join('tipo_reparacions', 'tipo_reparacions.id', '=', 'productos.tipo_reparacions_id')

                ->where('Negocio', 'LIKE', "%$keyword%")->orWhere('Modelo', 'LIKE', "%$keyword%")
              //  ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion2', 'LIKE', "%$keyword%")->orWhere('Stock', 'LIKE', "%$keyword%")
                ->orWhere('Precio', 'LIKE', "%$keyword%")->orWhere('Categoria', 'LIKE', "%$keyword%")
                ->select('productos.*', 'negocios.Negocio','modelos.Modelo', 'tipo_reparacions.Descripcion')
                ->latest()->paginate($perPage);
        } else {
            //$Producto = Producto::latest()->paginate($perPage);
            $Producto = DB::table('productos')
                ->join('negocios', 'negocios.id', '=', 'productos.negocios_id')
                ->join('modelos', 'modelos.id', '=', 'productos.modelos_id')
                ->join('tipo_reparacions', 'tipo_reparacions.id', '=', 'productos.tipo_reparacions_id')
                ->select('productos.*', 'negocios.Negocio', 'modelos.Modelo', 'tipo_reparacions.Descripcion')
                ->paginate($perPage);

        }


        return view('Producto.index', compact('Producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Producto = Producto::all();
        $Negocio = Negocio::all();
        $Modelo = Modelo::all();
        $Tipo_Reparacion = TipoReparacion::all();
        $Marca = Marca::all();
        return view('Producto.create',  compact('Producto','Tipo_Reparacion', 'Modelo', 'Negocio', 'Marca'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Producto = new Producto;
        $Producto -> id = $request -> get('id');
        $Producto -> negocios_id = $request -> get('negocios_id');
        $Producto -> Categoria = $request -> get('Categoria');
        $Producto -> modelos_id = $request -> get('modelos_id');
        $Producto -> tipo_reparacions_id = $request -> get('tipo_reparacions_id');
        $Producto -> Descripcion2 = $request -> get('Descripcion2');
        $Producto -> Stock = $request -> get('Stock');
        $Producto -> Precio = $request -> get('Precio');
        $Producto -> estado ='Activo';

        $Producto->save();




        return redirect('Producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Negocio  $Negocio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Negocio = DB::table('negocios')
            ->join('productos', 'negocios.id' , '=' , 'productos.negocios_id')
            ->select('negocios.Negocio')
            ->get();

        $Modelo = DB::table('modelos')
            ->join('productos', 'modelos.id' , '=' , 'productos.modelos_id')
            ->select('modelos.Modelo')
            ->get();

        $Tipo_Reparacion = DB::table('tipo_reparacions')
            ->join('productos', 'tipo_reparacions.id' , '=' , 'productos.tipo_reparacions_id')
            ->select('tipo_reparacions.Descripcion')
            ->get();




        $Producto = Producto::findOrFail($id);




        return view('Producto.show', compact('Producto', 'Tipo_Reparacion', 'Modelo', 'Negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Negocio  $Negocio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $Producto = Producto::findOrFail($id);
        $Negocio = Negocio::all();
        $Modelo = Modelo::all();
        $Marca = Marca::all();

        $Tipo_Reparacion = TipoReparacion::all();

        return view('Producto.edit',compact('Producto', 'Negocio', 'Modelo', 'Tipo_Reparacion', 'Marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Negocio  $Negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Producto = Producto::findOrFail($id);
        $Producto -> negocios_id = $request -> get('negocios_id');
        $Producto -> Categoria = $request -> get('Categoria');
        $Producto -> modelos_id = $request -> get('modelos_id');
        $Producto -> tipo_reparacions_id = $request -> get('tipo_reparacions_id');
        $Producto -> Descripcion2 = $request -> get('Descripcion2');
        $Producto -> Stock = $request -> get('Stock');
        $Producto -> Precio = $request -> get('Precio');
        $Producto -> estado ='Activo';

        $Producto->update();
        return redirect('Producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Negocio  $Negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $Producto = Producto::findOrFail($id);
        $Producto ->estado = "Inactivo";
        $Producto ->update();
        return redirect('Producto')->with('Mensaje','Producto eliminado con Exito');
    }
}
