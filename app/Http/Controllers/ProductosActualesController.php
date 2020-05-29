<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosActualesController extends Controller
{
      public function productos(){

    	$products = Productos::orderBy('id','desc');
    	$total = 0;
    	foreach($products as $product){
    		$total = $total + $product->existencia_producto;
    	}

    	return view('reportes.tacticos.productosActuales',compact('products','total'));
    }

}