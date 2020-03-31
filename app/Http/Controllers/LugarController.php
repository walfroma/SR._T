<?php

namespace App\Http\Controllers;

use App\Lugar;
use Illuminate\Http\Request;

//--------------------------------------

use App\Http\Requests;
//--------------------------------------
class LugarController extends Controller
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
            $Lugar = Lugar::where('Lugar', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Lugar = Lugar::latest()->paginate($perPage);

        }

        return view('Lugar.index',  compact('Lugar'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Lugar.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosLugar=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Lugar'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosLugar=request()->except('_token');
        Lugar::insert($datosLugar);

        //return response()->json($datosLugar);
        return redirect('Lugar')->with('Mensaje','Lugar agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Lugar = Lugar::findOrFail($id);

        return view('Lugar.show', compact('Lugar'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Lugar = Lugar::findOrFail($id);

        return view('Lugar.edit',compact('Lugar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Lugar'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosLugar=request()->except(['_token','_method']);
        Lugar::where('id','=',$id)->update($datosLugar);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Lugar')->with('Mensaje','Lugar modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Lugar::destroy($id);
        //return redirect('Lugar');
        return redirect('Lugar')->with('Mensaje','Lugar eliminado con Exito');
    }
}
