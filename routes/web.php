<?php

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
    return view('welcome');
});
//Route::view('/bitacora','bitacora');
Route::get('/bitacora','BitacoraController@bitacora')->name('bitacora.user');
Route::view('/etl','etl');
Route::view('/gestion_usuarios','usuarios.index');

Route::view('/productos_menos_movimiento','reportes.estrategicos.productoMenosMovimiento',['products'=>'','totalCantidad'=>'','totalVenta'=>'','pdf'=>0,'fechaD'=>0,'fechaH'=>0,'fecha'=>'']);
Route::post('/productos_menos_movimiento_reporte','ProductosMenosDemandaController@productos')->name('productos.menosdemanda');

Route::view('/productos_actuales','reportes.tacticos.productosActuales',['products'=>'','total'=>'','pdf'=>0,'fecha'=>'']);
Route::get('/productos_actuales_reporte','ProductosActualesController@productos')->name('productos.actuales');
Route::get('/productos_actuales_pdf','ProductosActualesController@productosPdf')->name('productos.pdf');
