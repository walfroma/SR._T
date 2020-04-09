<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Producto;
use App\Reservacion;
use App\TipoReparacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacionController extends Controller
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
            $Reservacion = Reservacion::where('Fecha_Reserva', 'LIKE', "%$keyword%")
                ->orWhere('Fecha_Entrega', 'LIKE', "%$keyword%")->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhere('Estado', 'LIKE', "%$keyword%")->orWhere('Cantidad', 'LIKE', "%$keyword%")
                ->orWhere('productos_id', 'LIKE', "%$keyword%")->orWhere('tipo_reparacions_id', 'LIKE', "%$keyword%")
                ->orWhere('Tipo_Reservacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $Reservacion = Reservacion::latest()->paginate($perPage);


        }
        $Producto = DB::table('productos')
            ->join('reservacions', 'productos.id' , '=' , 'reservacions.productos_id')
            ->select('productos.modelos_id')
            ->get();



        $Tipo_Reparacion = DB::table('tipo_reparacions')
            ->join('reservacions', 'tipo_reparacions.id' , '=' , 'reservacions.tipo_reparacions_id')
            ->select('tipo_reparacions.Descripcion')
            ->get();






        return view('Reservacion.index', compact('Reservacion', 'Tipo_Reparacion',  'Producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Reservacion = Reservacion::all();
        $Producto = Producto::all();
        $Tipo_Reparacion = TipoReparacion::all();

        $now = Carbon::now();
        $currenDate = $now->format('d-m-Y');


        return view('Reservacion.create',  compact('Reservacion','Tipo_Reparacion', 'Producto' , 'now','currenDate'));

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
            'productos_id'=>'required|integer',

            'Estado'=>'string|max:100',
            'tipo_reparacions_id'=>'required|integer',

            'Tipo_Reparacion'=>'string|max:300',
            'Cantidad'=>'required|integer',


        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosReservacion=request()->except('_token');
        Reservacion::insert($datosReservacion);



        //return response()->json($datosLugar);
        return redirect('Reservacion')->with('Mensaje','Reservacion agregado con Exito');
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

        $Producto = DB::table('productos')
            ->join('R¿reservacions', 'productos.id' , '=' , 'reservacions.productos_id')
            ->select('productos.modelos_id')
            ->get();

        $Tipo_Reparacion = DB::table('tipo_reparacions')
            ->join('reservacions', 'tipo_reparacions.id' , '=' , 'reservacions.tipo_reparacions_id')
            ->select('tipo_reparacions.Descripcion')
            ->get();




        $Reservacion = Reservacion::findOrFail($id);




        return view('Reservacion.show', compact('Reservacion', 'Tipo_Reparacion', 'Producto'));
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


        $Reservacion = Reservacion::findOrFail($id);


        return view('Reservacion.edit',compact('Reservacion'));
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

        $campos=[
            'Estado'=>'string|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosReservacion=request()->except(['_token','_method']);
        Reservacion::where('id','=',$id)->update($datosReservacion);

        //$Lugar = Lugar::findOrFail($id);
        //return view('Lugar.edit',compact('Lugar'));
        return redirect('Reservacion')->with('Mensaje','Reservacion modificado con Exito');

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
        Reservacion::destroy($id);
        //return redirect('Lugar');
        return redirect('Reservacion')->with('Mensaje','Reservacion eliminado con Exito');
    }
}
