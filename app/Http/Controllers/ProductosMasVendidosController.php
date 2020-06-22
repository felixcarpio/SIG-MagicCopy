<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use app\Productos;
use app\Pedidos;
use app\Detalles;
use app\ProductosPedidos;



class ProductosMasVendidosController extends Controller
{
    public function index()
    {      
        /*$productos = Productos::all();
        $pedidos = Pedidos::all();
        $detalles = Detalles::all();*/
        return view('10_productos_mas_vendidos',compact('productos','pedidos','detalles'));
    }

    public function mostraProductos(Request $request){

        $this->validate($request,[
            'Desde'=>'required',
            'Hasta'=>'required',
            ]);
        
            $desde = $request->Desde;
            $hasta = $request->Hasta;
    
            if ( $desde > $hasta ) {
                $desde = '' ;
                $hasta = '' ;
                return view('10_productos_mas_vendidos');
            }

            $pedidosvalidos = Pedidos::whereBetween('fecha_Solicitud',[$desde,$hasta])->get();

            return Redirect::to("/10_productos_mas_vendidos.detalle");
    }

}
