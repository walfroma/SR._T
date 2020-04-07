<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Factura.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosFactura=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Factura'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosFactura=request()->except('_token');
        Factura::insert($datosFactura);

        //return response()->json($datosFactura);
        return redirect('Factura')->with('Mensaje','Factura agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $Factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Factura = Factura::findOrFail($id);

        return view('Factura.show', compact('Factura'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $Factura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Factura = Factura::findOrFail($id);

        return view('Factura.edit',compact('Factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $Factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Factura'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosFactura=request()->except(['_token','_method']);
        Factura::where('id','=',$id)->update($datosFactura);

        //$Factura = Factura::findOrFail($id);
        //return view('Factura.edit',compact('Factura'));
        return redirect('Factura')->with('Mensaje','Factura modificado con Exito');
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
