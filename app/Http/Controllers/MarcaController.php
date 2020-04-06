<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{


    public function __construct()
    {
        $this->middleware(['permission:Creacion de Marca'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:Navegar Marca'], ['only' => 'index']);
        $this->middleware(['permission:Edicion de Marca'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:Eliminar Marca'], ['only' => 'delete']);
        $this->middleware(['permission:Ver detalle de Marca'], ['only' => 'show']);

    }
    public function index(Request $id)
    {
        //
        $keyword = $id->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $Marca = Marca::where('Marca', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Marca = Marca::latest()->paginate($perPage);

        }

        return view('Marca.index',  compact('Marca'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Marca.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosMarca=request()->all();
        //Para requerir y validar datos
        $campos=[
            'Marca'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];
        $this->validate($request,$campos,$Mensaje);

        $datosMarca=request()->except('_token');
        Marca::insert($datosMarca);

        //return response()->json($datosMarca);
        return redirect('Marca')->with('Mensaje','Marca agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Marca = Marca::findOrFail($id);

        return view('Marca.show', compact('Marca'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Marca = Marca::findOrFail($id);

        return view('Marca.edit',compact('Marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Para requerir y validar datos
        $campos=[
            'Marca'=>'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosMarca=request()->except(['_token','_method']);
        Marca::where('id','=',$id)->update($datosMarca);

        //$Marca = Marca::findOrFail($id);
        //return view('Marca.edit',compact('Marca'));
        return redirect('Marca')->with('Mensaje','Marca modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Marca::destroy($id);
        //return redirect('Marca');
        return redirect('Marca')->with('Mensaje','Marca eliminado con Exito');
    }
}
