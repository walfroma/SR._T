<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

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
            $Producto = Producto::where('Producto', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Producto = Producto::latest()->paginate($perPage);

        }

        return view('Producto.index',  compact('Producto'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Producto.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosProducto=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Producto'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosProducto=request()->except('_token');
        Producto::insert($datosProducto);

        //return response()->json($datosProducto);
        return redirect('Producto')->with('Mensaje','Producto agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Producto = Producto::findOrFail($id);

        return view('Producto.show', compact('Producto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Producto = Producto::findOrFail($id);

        return view('Producto.edit',compact('Producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Producto'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosProducto=request()->except(['_token','_method']);
        Producto::where('id','=',$id)->update($datosProducto);

        //$Producto = Producto::findOrFail($id);
        //return view('Producto.edit',compact('Producto'));
        return redirect('Producto')->with('Mensaje','Producto modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        //return redirect('Producto');
        return redirect('Producto')->with('Mensaje','Producto eliminado con Exito');
    }
}
