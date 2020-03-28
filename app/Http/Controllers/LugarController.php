<?php

namespace App\Http\Controllers;

use App\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Lugar'] = Lugar::paginate(5);

        return view('Lugar.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Lugar.create');
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

        $datosLugar=request()->except('_token');
        Lugar::insert($datosLugar);

        return response()->json($datosLugar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function show(Lugar $lugar)
    {
        //
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
        $datosLugar=request()->except(['_token','_method']);
        Lugar::where('id','=',$id)->update($datosLugar);

        $Lugar = Lugar::findOrFail($id);
        return view('Lugar.edit',compact('Lugar'));
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
        return redirect('Lugar');
    }
}
