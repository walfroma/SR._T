<?php

namespace App\Http\Controllers;

use App\Bateria;
use Illuminate\Http\Request;

class BateriaController extends Controller
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
            $Bateria = Bateria::where('Bateria', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Bateria = Bateria::latest()->paginate($perPage);

        }

        return view('Bateria.index',  compact('Bateria'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Bateria.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosBateria=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Bateria'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];
        $this->validate($request,$campos,$Mensaje);

        $datosBateria=request()->except('_token');
        Bateria::insert($datosBateria);

        //return response()->json($datosBateria);
        return redirect('Bateria')->with('Mensaje','Bateria agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bateria  $Bateria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Bateria = Bateria::findOrFail($id);

        return view('Bateria.show', compact('Bateria'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bateria  $Bateria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Bateria = Bateria::findOrFail($id);

        return view('Bateria.edit',compact('Bateria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bateria  $Bateria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Bateria'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosBateria=request()->except(['_token','_method']);
        Bateria::where('id','=',$id)->update($datosBateria);

        //$Bateria = Bateria::findOrFail($id);
        //return view('Bateria.edit',compact('Bateria'));
        return redirect('Bateria')->with('Mensaje','Bateria modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bateria  $Bateria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Bateria::destroy($id);
        //return redirect('Bateria');
        return redirect('Bateria')->with('Mensaje','Bateria eliminado con Exito');
    }
}

