<?php

namespace App\Http\Controllers;

use App\Negocio;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegocioController extends Controller
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
            $Negocio = Negocio::where('Negocio', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")->orWhere('Telefono', 'LIKE', "%$keyword%")
                ->orWhere('Direccion', 'LIKE', "%$keyword%")->orWhere('Ubicacion', 'LIKE', "%$keyword%")
                ->orWhere('Correo', 'LIKE', "%$keyword%")->orWhere('users_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Negocio = Negocio::latest()->paginate($perPage);


        }




        return view('Negocio.index', compact('Negocio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Negocio = Negocio::all();
        $Usuario = User::all();
        return view('Negocio.create',  compact('Negocio','Usuario'));

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
            'Negocio'=>'required|string|max:100',
            'Telefono'=>'required|integer',
            'Direccion'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'usuarios_id'=>'required|integer',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosNegocio=request()->except('_token');
        Negocio::insert($datosNegocio);

        //return response()->json($datosLugar);
        return redirect('Negocio')->with('Mensaje','Negocio agregado con Exito');
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
        $Usuario = DB::table('users')
            ->join('negocios', 'users.id' , '=' , 'negocios.users_id')
            ->select('users.Nombre')
        ->get();




        $Negocio = Negocio::findOrFail($id);



        return view('Negocio.show', compact('Negocio', 'Usuario'));
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


        $Negocio = Negocio::findOrFail($id);
        $Usuario = User::all();

        return view('Negocio.edit',compact('Negocio', 'Usuario'));
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
            'Negocio'=>'required|string|max:100',
            'Telefono'=>'required|integer',
            'Direccion'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'usuarios_id'=>'required|integer',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosNegocio=request()->except(['_token','_method']);
        Negocio::where('id','=',$id)->update($datosNegocio);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Negocio')->with('Mensaje','Negocio modificado con Exito');
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
        Negocio::destroy($id);
        //return redirect('Lugar');
        return redirect('Negocio')->with('Mensaje','Negocio eliminado con Exito');
    }
}
