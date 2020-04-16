<?php

namespace App\Http\Controllers;

use App\Bateria;
use App\Especificaciones;
use App\Modelo;
use App\Pantalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecificacionesController extends Controller
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
            $Especificaciones = DB::table('especificaciones')
                ->join('modelos', 'modelos.id', '=', 'especificaciones.modelos_id')
                ->join('baterias', 'baterias.id', '=', 'especificaciones.baterias_id')
                ->join('pantallas', 'pantallas.id', '=', 'especificaciones.pantallas_id')

                ->where('Modelo', 'LIKE', "%$keyword%")->orWhere('Pantalla', 'LIKE', "%$keyword%")
                ->orWhere('Bateria', 'LIKE', "%$keyword%")
                ->select(  'especificaciones.*', 'baterias.Bateria', 'pantallas.Pantalla', 'modelos.Modelo')
                ->latest()->paginate($perPage);

        } else {
           // $Especificaciones = Especificaciones::latest()->paginate($perPage);
            $Especificaciones = DB::table('especificaciones')
                ->join('baterias', 'baterias.id', '=', 'especificaciones.baterias_id')
                ->join('pantallas', 'pantallas.id', '=', 'especificaciones.pantallas_id')
                ->join('modelos', 'modelos.id', '=', 'especificaciones.modelos_id')
                ->select('especificaciones.*', 'baterias.Bateria', 'pantallas.Pantalla', 'modelos.Modelo')
                ->paginate($perPage);



        }

        return view('Especificaciones.index', compact('Especificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Especificaciones = Especificaciones::all();
        $Bateria = Bateria::all();
        $Modelo = Modelo::all();
        $Pantalla = Pantalla::all();

        return view('Especificaciones.create',  compact('Especificaciones','Bateria', 'Modelo', 'Pantalla'));

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

            'pantallas_id'=>'required',
            'baterias_id'=>'required',
            'modelos_id'=>'required',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEspecificaciones=request()->except('_token');
        Especificaciones::insert($datosEspecificaciones);

        //return response()->json($datosLugar);
        return redirect('Especificaciones')->with('Mensaje','Especificaciones agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especificaciones  $Especificaciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $Especificaciones = Especificaciones::findOrFail($id);
        $Bateria = Bateria::all();
        $Modelo = Modelo::all();
        $Pantalla = Pantalla::all();



        return view('Especificaciones.show', compact('Especificaciones', 'Bateria','Modelo','Pantalla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especificaciones  $Especificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $Especificaciones = Especificaciones::findOrFail($id);
        $Bateria = Bateria::all();
        $Modelo = Modelo::all();
        $Pantalla = Pantalla::all();

        return view('Especificaciones.edit',compact('Especificaciones', 'Bateria','Modelo','Pantalla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especificaciones  $Especificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'pantallas_id'=>'required',
            'baterias_id'=>'required',
            'modelos_id'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosEspecificaciones=request()->except(['_token','_method']);
        Especificaciones::where('id','=',$id)->update($datosEspecificaciones);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Especificaciones')->with('Mensaje','Especificaciones modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especificaciones  $Especificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Especificaciones::destroy($id);
        //return redirect('Lugar');
        return redirect('Especificaciones')->with('Mensaje','Especificaciones eliminado con Exito');
    }
}

