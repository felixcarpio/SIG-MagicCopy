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
    return view('/auth/login');
});

Route::view('/etl','etl');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['role:gerente']], function(){
Route::view('/productos_menos_movimiento','reportes.estrategicos.productoMenosMovimiento');
});

Route::group(['middleware'=> ['role:subgerente']], function(){
Route::view('/productos_actuales','reportes.tacticos.productosActuales');
});

Route::group(['middleware'=> ['role:administrador']], function(){
    Route::resource('usuarios', 'UserController');
    Route::view('/gestion_usuarios','usuarios.index');
    Route::view('/bitacora','bitacora');
});
