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
            $Producto = Negocio::where('Categoria', 'LIKE', "%$keyword%")
                ->orWhere('modelos_id', 'LIKE', "%$keyword%")->orWhere('tipo_reparacion_id', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")->orWhere('Cantidad', 'LIKE', "%$keyword%")
                ->orWhere('Precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Producto = Producto::latest()->paginate($perPage);


        }
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






        return view('Producto.index', compact('Producto', 'Tipo_Reparacion', 'Modelo', 'Negocio'));
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
        $campos=[
            'negocios_id'=>'required|integer',
            'modelos_id'=>'required|integer',
            'Categoria'=>'string|max:100',
            'tipo_reparacions_id'=>'required|integer',

            'Descripcion'=>'string|max:300',
            'Cantidad'=>'required|integer',


        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosProducto=request()->except('_token');
        Producto::insert($datosProducto);



        //return response()->json($datosLugar);
        return redirect('Producto')->with('Mensaje','Producto agregado con Exito');
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
        $Negocio = Negocio::findOrFail($id);
        $Modelo = Modelo::findOrFail($id);
        $Marca = Marca::findOrFail($id);
        $Tipo_Reparacion = TipoReparacion::findOrFail($id);

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
        $campos=[
            'negocios_id'=>'required|integer',
            'modelos_id'=>'required|integer',
            'Categoria'=>'max:100',
            'tipo_reparacions_id'=>'integer',

            'Descripcion'=>'string|max:300',
            'Cantidad'=>'required|integer',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosProducto=request()->except(['_token','_method']);
        Producto::where('id','=',$id)->update($datosProducto);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Producto')->with('Mensaje','Producto modificado con Exito');
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
        Producto::destroy($id);
        //return redirect('Lugar');
        return redirect('Producto')->with('Mensaje','Producto eliminado con Exito');
    }
}
