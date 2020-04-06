<?php

namespace App\Http\Controllers;

use App\Especificaciones;
use App\Modelo;
use App\Marca;
use App\Negocio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $Modelo = Negocio::where('Modelo', 'LIKE', "%$keyword%")
                ->orWhere('resolucion', 'LIKE', "%$keyword%")->orWhere('Cam_Tras', 'LIKE', "%$keyword%")
                ->orWhere('Cam_Front', 'LIKE', "%$keyword%")->orWhere('MicroSD', 'LIKE', "%$keyword%")
                ->orWhere('Lector_Huella', 'LIKE', "%$keyword%")->orWhere('SistemaOperativo', 'LIKE', "%$keyword%")
                ->orWhere('Ram', 'LIKE', "%$keyword%")->orWhere('Almacenamiento', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Modelo = Modelo::latest()->paginate($perPage);


        }
        $Marca = DB::table('marcas')
            ->join('modelos', 'marcas.id' , '=' , 'modelos.marcas_id')
            ->select('marcas.Marca')
            ->get();




        return view('Modelo.index', compact('Modelo', 'Marca'));
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

        $datosNegocio=request()->except('_token');
        Modelo::insert($datosNegocio);



        //return response()->json($datosLugar);
        return redirect('Modelo')->with('Mensaje','Modelo agregado con Exito');
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
        $Marca = DB::table('marcas')
            ->join('modelos', 'marcas.id' , '=' , 'modelos.marcas_id')
            ->select('marcas.Marca')
            ->get();




        $Modelo = Modelo::findOrFail($id);




        return view('Modelo.show', compact('Modelo', 'Marca'));
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


        $Modelo = Modelo::findOrFail($id);
        $Marca = Marca::all();

        return view('Modelo.edit',compact('Modelo', 'Marca'));
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


        $datosNegocio=request()->except(['_token','_method']);
        Modelo::where('id','=',$id)->update($datosNegocio);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Modelo')->with('Mensaje','Modelo modificado con Exito');
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
        Modelo::destroy($id);
        //return redirect('Lugar');
        return redirect('Modelo')->with('Mensaje','Modelo eliminado con Exito');
    }
}
