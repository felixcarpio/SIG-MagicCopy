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
    Route::post('/etl/run','ETLController@etl');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');

    //incluir todas las direcciones de reportes estrategicos
    Route::group(['middleware'=> ['role:gerente']], function(){
        Route::view('/productos_menos_movimiento','reportes.estrategicos.productoMenosMovimiento');
        Route::view('/ganancias','reportes.estrategicos.ganancias',['pdf'=>0,'desde'=>'','hasta'=>'','fecha'=>'','success'=>'','ingreso'=>0.00,'egreso'=>0.00,'total'=>0.00])->name('ganancias.pantalla');
        Route::get('/ganancias_reporte','GananciasController@ganancias')->name('ganancias.periodo');
        Route::get('/ganancias_reporte_preview','GananciasController@gananciasPreview')->name('ganancias.preview');
        Route::get('/ganancias_reporte_pdf/{desde}/{hasta}','GananciasController@gananciasPDF')->name('ganancias.pdf');
    });

    //incluir todas las direcciones de reportes tacticos
    Route::group(['middleware'=> ['role:subgerente|gerente|asesor de ventas']], function(){
        Route::view('/productos_actuales','reportes.tacticos.productosActuales',['products'=>'','total'=>'','pdf'=>0,'fecha'=>'']);
        Route::get('/productos_actuales_reporte','ProductosActualesController@productos')->name('productos.actuales');
        Route::get('/productos_actuales_pdf','ProductosActualesController@productosPdf')->name('productos.pdf');
        Route::view('/10_productos_mas_vendidos','reportes.tacticos.productosMasVendidos',['desde'=>'','hasta'=>'','nombre'=>'','codigo'=>'','pdf'=>0,'cantidad'=>'','id'=>'','total'=>'']);
        Route::resource('/productos_mas_vendidos','ProductosMasVendidosController');
        Route::get('/productos_mas_vendidos_reporte','ProductosMasVendidosController@llenarTabla')->name('productosmasvendidos.llenarTabla');
        Route::get('/productos_mas_vendidos_pdf','ProductosMasVendidosController@reportePdf')->name('reportes.pdf');
        
    });

    Route::group(['middleware'=> ['role:administrador']], function(){
        Route::resource('usuarios', 'UserController');
        Route::view('/gestion_usuarios','usuarios.index');
        Route::resource('/bitacora','BitacoraController');
        //Route::view('/bitacora','bitacora');
        Route::get('/bitacora','BitacoraController@bitacora')->name('bitacora.user');
    });

});

