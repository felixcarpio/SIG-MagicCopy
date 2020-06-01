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
Route::post('/etl','ETLController@etl');
Route::view('/gestion_usuarios','usuarios.index');

Route::view('/ganancias','reportes.estrategicos.ganancias',['pdf'=>0,'desde'=>0,'hasta'=>0,'fecha'=>'','success'=>''])->name('ganancias.pantalla');
Route::post('/ganancias_reporte','GananciasController@ganancias')->name('ganancias.periodo');
Route::get('/ganancias_reporte_preview','GananciasController@gananciasPreview')->name('ganancias.preview');

Route::view('/productos_actuales','reportes.tacticos.productosActuales',['products'=>'','total'=>'','pdf'=>0,'fecha'=>'']);
Route::get('/productos_actuales_reporte','ProductosActualesController@productos')->name('productos.actuales');
Route::get('/productos_actuales_pdf','ProductosActualesController@productosPdf')->name('productos.pdf');
