<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/Lugar', 'LugarController@index');
//Route::get('/Lugar/create', 'LugarController@create');



Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Lugar', 'LugarController') /*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Bateria', 'BateriaController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Marca', 'MarcaController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Negocio', 'NegocioController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Pantalla', 'PantallaController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Tipo_Reparacion', 'TipoReparacionController')/*->middleware('auth')*/;
});
//Route::group(['middleware' => ['role:master|editor|moderador']], function (){
    Route::resource('Usuario', 'UsersController');
//});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Modelo', 'ModeloController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Detalle_Venta', 'DetalleVentaController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Especificaciones', 'EspecificacionesController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Factura', 'FacturaController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Producto', 'ProductoController')/*->middleware('auth')*/;
});
Route::group(['middleware' => ['role:master|cliente']], function (){
    Route::resource('Reservacion', 'ReservacionController')/*->middleware('auth')*/;
});





Auth::routes(/*['register'=>false]*/);

    Route::get('/home', 'HomeController@index')->name('home');

