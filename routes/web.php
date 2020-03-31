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

Route::resource('Lugar', 'LugarController') /*->middleware('auth')*/;
Route::resource('Bateria', 'BateriaController')/*->middleware('auth')*/;
Route::resource('Marca', 'MarcaController')/*->middleware('auth')*/;
Route::resource('Negocio', 'NegocioController')/*->middleware('auth')*/;
Route::resource('Pantalla', 'PantallaController')/*->middleware('auth')*/;
Route::resource('Tipo_Reparacion', 'TipoReparacionController')/*->middleware('auth')*/;
Route::resource('Usuario', 'UsuarioController')/*->middleware('auth')*/;



Auth::routes(/*['register'=>false]*/);

Route::get('/home', 'HomeController@index')->name('home');
