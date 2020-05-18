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
Route::view('/bitacora','bitacora');
Route::view('/etl','etl');
Route::view('/productos_menos_movimiento','reportes.estrategicos.productoMenosMovimiento');
Route::view('/productos_actuales','reportes.tacticos.productosActuales');
Route::view('/gestion_usuarios','usuarios.index');
