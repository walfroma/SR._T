<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:Creacion de usuarios'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:Navegar usuarios'], ['only' => 'index']);
        $this->middleware(['permission:Edicion de usuarios'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:Eliminar usuarior'], ['only' => 'delete']);
        $this->middleware(['permission:Ver detalle de usuario'], ['only' => 'show']);

    }

    public function index(Request $id)
    {
        //
        $keyword = $id->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $Usuario = User::where( 'name', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Apellido', 'LIKE', "%$keyword%")
                ->orWhere('Telefono', 'LIKE', "%$keyword%")
                ->orWhere('Direccion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Usuario = User::latest()->paginate($perPage);

        }

        return view('Usuario.index',  compact('Usuario'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Usuario = User::all();
        $roles = Role::all()->pluck('name', 'id');

        return view('Usuario.create', compact('roles', 'Usuario') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Usuario = new User;


        $Usuario->name = $request->name;
        $Usuario->email = $request->email;
        $Usuario->password = bcrypt($request->password);
        $Usuario->Nombre = $request->Nombre;
        $Usuario->Apellido = $request->Apellido;
        $Usuario->Telefono = $request->Telefono;
        $Usuario->Direccion = $request->Direccion;

        if($Usuario->save()){
            //-----asignar rol ....
            $Usuario->assignRole($request->rol);
        }

        //return response()->json($datosLugar);
        return redirect('Usuario');;
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
        $Usuario = User::findOrFail($id);


        return view('Usuario.show', compact('Usuario'));

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
        $Usuario = User::findOrFail($id);

        $roles = Role::all()->pluck('name', 'id');

        return view('Usuario.edit', compact('Usuario', 'roles'));
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
        $Usuario = User::findOrFail($id);

        $Usuario->name = $request->name;
        $Usuario->email = $request->email;
        $Usuario->Nombre = $request->Nombre;
        $Usuario->Apellido = $request->Apellido;
        $Usuario->Telefono = $request->Telefono;
        $Usuario->Direccion = $request->Direccion;


        if ($request->password != null) {
            $Usuario->password = $request->password;
        }

        $Usuario->syncRoles([$request->rol]);

        $Usuario->save();

        return redirect('/Usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Usuario = User::findOrFail($id);

        $Usuario->removeRole($Usuario->roles->implode('name', ', '));

        if ($Usuario->delete()) {
            return redirect('/Usuario');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el usuario.'
        ]);
    }
}
