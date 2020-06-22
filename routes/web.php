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
Route::group(['middleware' => ['guest']], function () {
    Auth::routes();
    Route::get('/', function () {
        return view('/auth/login');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::view('/etl','etl');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');

    //incluir todas las direcciones de reportes estrategicos
    Route::group(['middleware'=> ['role:gerente']], function(){
        Route::view('/productos_menos_movimiento','reportes.estrategicos.productoMenosMovimiento');
    });

    //incluir todas las direcciones de reportes tacticos
    Route::group(['middleware'=> ['role:subgerente|gerente']], function(){
        Route::view('/productos_actuales','reportes.tacticos.productosActuales');
        Route::view('/10_productos_mas_vendidos','reportes.tacticos.productosMasVendidos');
        Route::resource('/productos_mas_vendidos','ProductosMasVendidosController');
    });

    Route::group(['middleware'=> ['role:administrador']], function(){
        Route::resource('usuarios', 'UserController');
        Route::view('/gestion_usuarios','usuarios.index');
        Route::resource('/bitacora','BitacoraController');
    });

});
