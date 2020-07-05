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
Route::post('/etl/run','ETLController@etl');
Route::view('/gestion_usuarios','usuarios.index');

Route::view('/ganancias','reportes.estrategicos.ganancias',['pdf'=>0,'desde'=>'','hasta'=>'','fecha'=>'','success'=>'','ingreso'=>0.00,'egreso'=>0.00,'total'=>0.00])->name('ganancias.pantalla');
Route::get('/ganancias_reporte','GananciasController@ganancias')->name('ganancias.periodo');
Route::get('/ganancias_reporte_preview','GananciasController@gananciasPreview')->name('ganancias.preview');
Route::get('/ganancias_reporte_pdf/{desde}/{hasta}','GananciasController@gananciasPDF')->name('ganancias.pdf');

Route::view('/productos_actuales','reportes.tacticos.productosActuales',['products'=>'','total'=>'','pdf'=>0,'fecha'=>'']);
Route::get('/productos_actuales_reporte','ProductosActualesController@productos')->name('productos.actuales');
Route::get('/productos_actuales_pdf','ProductosActualesController@productosPdf')->name('productos.pdf');

//Route::view('/compararGanancia','reportes.estrategicos.compararGanancia')->name('compararGanancia');
//Route::view('/mostrarComparativa','reportes.estrategicos.compararGanancia')->name('compararGanancia');
//Route::post('/compararGanancia','ComparativaController@comp');
Route::get('/compararGanancia','ComparativaController@cargar')->name('compararGanancia.pantalla');
Route::get('/compararGanancia_reporte','ComparativaController@comp')->name('compararGanancia.comp');
Route::get('/compararGanancia_reporte_preview','ComparativaController@comparativaPreview')->name('compararGananacia.preview');
Route::get('/compararGanancia_reporte_pdf/{fechaini}/{fechafin}/{producto}','ComparativaController@comparativaPDF')->name('compararGanancia.pdf');