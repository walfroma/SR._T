<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
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
            $Modelo = Modelo::where('Modelo', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")->orWhere('marcas_id', 'LIKE', "%$keyword%")
                ->orWhere('resolucion', 'LIKE', "%$keyword%")->orWhere('Cam_Tras', 'LIKE', "%$keyword%")
                ->orWhere('Cam_Front', 'LIKE', "%$keyword%")->orWhere('SistemaOperativo', 'LIKE', "%$keyword%")
                ->orWhere('Ram', 'LIKE', "%$keyword%")->orWhere('Almacenamiento', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Modelo = Modelo::latest()->paginate($perPage);


        }




        return view('Modelo.index', compact('Modelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Modelo = Modelo::all();
        $Marca = Marca::all();
        return view('Modelo.create',  compact('Modelo','Marca'));

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
            'Modelo'=>'required|string|max:100',
            'marcas_id'=>'required|integer',
            'resolucion'=>'string|max:100',
            'Cam_Tras'=>'string|max:100',
            'Cam_Front'=>'string|max:100',
            'MicroSD'=>'required|string',
            'Lector_Huella'=>'required|string',
            'SistemaOperativo'=>'required|string',
            'Ram'=>'required|string',
            'Almacenamiento'=>'required|string',
            'Descripcion'=>'required|string'

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosModelo=request()->except('_token');
        Modelo::insert($datosModelo);

        //return response()->json($datosLugar);
        return redirect('Modelo')->with('Mensaje','Modelo agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $Modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //


        $Modelo = Modelo::findOrFail($id);



        return view('Modelo.show', compact('Modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $Modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $Modelo = Modelo::findOrFail($id);
        $Marca = Marca::all();

        return view('Modelo.edit',compact('Modelo', 'Marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $Modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Modelo'=>'required|string|max:100',
            'marcas_id'=>'required|integer',
            'resolucion'=>'string|max:100',
            'Cam_Tras'=>'string|max:100',
            'Cam_Front'=>'string|max:100',
            'MicroSD'=>'required|string',
            'Lector_Huella'=>'required|string',
            'SistemaOperativo'=>'required|string',
            'Ram'=>'required|string',
            'Almacenamiento'=>'required|string',
            'Descripcion'=>'required|string'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosModelo=request()->except(['_token','_method']);
        Modelo::where('id','=',$id)->update($datosModelo);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Modelo')->with('Mensaje','Modelo modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $Modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Modelo::destroy($id);
        //return redirect('Lugar');
        return redirect('Modelo')->with('Mensaje','Modelo eliminado con Exito');
    }
}
