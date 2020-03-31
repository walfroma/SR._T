<?php

namespace App\Http\Controllers;

use App\Lugar;
use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        //
        $Lugar = Lugar::all();
        $keyword = $id->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $Usuario = Usuario::where('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")->orWhere('Apellido', 'LIKE', "%$keyword%")
                ->orWhere('Telefono', 'LIKE', "%$keyword%")->orWhere('Direccion', 'LIKE', "%$keyword%")
                ->orWhere('Tipo_Usuario', 'LIKE', "%$keyword%")->orWhere('lugars_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Usuario = Usuario::latest()->paginate($perPage);


        }

        return view('Usuario.index', compact('Usuario', 'Lugar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Usuario = Usuario::all();
        $Lugar = Lugar::all();
        return view('Usuario.create',  compact('Usuario','Lugar'));

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
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Telefono'=>'required|integer',
            'Direccion'=>'required|string|max:100',
            'Tipo_Usuario'=>'required|string|max:100',
            'lugars_id'=>'required|integer',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosUsuario=request()->except('_token');
        Usuario::insert($datosUsuario);

        //return response()->json($datosLugar);
        return redirect('Usuario')->with('Mensaje','Usuario agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Lugar = Lugar::all();
        $Usuario = Usuario::findOrFail($id);



        return view('Usuario.show', compact('Usuario', 'Lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $Usuario = Usuario::findOrFail($id);
        $Lugar = Lugar::all();

        return view('Usuario.edit',compact('Usuario', 'Lugar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Telefono'=>'required|integer',
            'Direccion'=>'required|string|max:100',
            'Tipo_Usuario'=>'required|string|max:100',
            'lugars_id'=>'required|integer',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosUsuario=request()->except(['_token','_method']);
        Usuario::where('id','=',$id)->update($datosUsuario);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Usuario')->with('Mensaje','Usuario modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);
        //return redirect('Lugar');
        return redirect('Usuario')->with('Mensaje','Usuario eliminado con Exito');
    }
}
