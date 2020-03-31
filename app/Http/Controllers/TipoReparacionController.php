<?php

namespace App\Http\Controllers;

use App\TipoReparacion;
use Illuminate\Http\Request;

class TipoReparacionController extends Controller
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
            $TipoReparacion = Tipo_Reparacion::where('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $TipoReparacion = TipoReparacion::latest()->paginate($perPage);

        }

        return view('Tipo_Reparacion.index',  compact('TipoReparacion'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tipo_Reparacion.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosTipo_Reparacion=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Descripcion'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];
        $this->validate($request,$campos,$Mensaje);

        $datosTipo_Reparacion=request()->except('_token');
        TipoReparacion::insert($datosTipo_Reparacion);

        //return response()->json($datosTipo_Reparacion);
        return redirect('Tipo_Reparacion')->with('Mensaje','Tipo Reparacion agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo_Reparacion  $Tipo_Reparacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Tipo_Reparacion = TipoReparacion::findOrFail($id);

        return view('Tipo_Reparacion.show', compact('Tipo_Reparacion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo_Reparacion  $Tipo_Reparacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $TipoReparacion = TipoReparacion::findOrFail($id);

        return view('Tipo_Reparacion.edit',compact('TipoReparacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo_Reparacion  $Tipo_Reparacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Descripcion'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosTipo_Reparacion=request()->except(['_token','_method']);
        TipoReparacion::where('id','=',$id)->update($datosTipo_Reparacion);

        //$Tipo_Reparacion = Tipo_Reparacion::findOrFail($id);
        //return view('Tipo_Reparacion.edit',compact('Tipo_Reparacion'));
        return redirect('Tipo_Reparacion')->with('Mensaje','Tipo_Reparacion modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo_Reparacion  $Tipo_Reparacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TipoReparacion::destroy($id);
        //return redirect('Tipo_Reparacion');
        return redirect('Tipo_Reparacion')->with('Mensaje','Tipo_Reparacion eliminado con Exito');
    }
}


