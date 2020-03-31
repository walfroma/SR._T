<?php

namespace App\Http\Controllers;

use App\Pantalla;
use Illuminate\Http\Request;

class PantallaController extends Controller
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
            $Pantalla = Pantalla::where('Pantalla', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Pantalla = Pantalla::latest()->paginate($perPage);

        }

        return view('Pantalla.index',  compact('Pantalla'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pantalla.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosPantalla=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Pantalla'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];
        $this->validate($request,$campos,$Mensaje);

        $datosPantalla=request()->except('_token');
        Pantalla::insert($datosPantalla);

        //return response()->json($datosPantalla);
        return redirect('Pantalla')->with('Mensaje','Pantalla agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pantalla  $Pantalla
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Pantalla = Pantalla::findOrFail($id);

        return view('Pantalla.show', compact('Pantalla'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pantalla  $Pantalla
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Pantalla = Pantalla::findOrFail($id);

        return view('Pantalla.edit',compact('Pantalla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pantalla  $Pantalla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Pantalla'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosPantalla=request()->except(['_token','_method']);
        Pantalla::where('id','=',$id)->update($datosPantalla);

        //$Pantalla = Pantalla::findOrFail($id);
        //return view('Pantalla.edit',compact('Pantalla'));
        return redirect('Pantalla')->with('Mensaje','Pantalla modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pantalla  $Pantalla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pantalla::destroy($id);
        //return redirect('Pantalla');
        return redirect('Pantalla')->with('Mensaje','Pantalla eliminado con Exito');
    }
}



