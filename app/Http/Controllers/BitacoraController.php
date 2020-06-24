<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
class BitacoraController extends Controller
{
    public function bitacora(){
    	$bitacoras=[];
    	try {
    		$bitacoras = Bitacora::orderBy('id','ASC')->get();
    	} catch (Illuminate\Database\QueryException $e) {
    		$bitacoras = false;
    	}
    //return view('bitacora',['bitacoras'=>Bitacora::orderBy('id','DESC')->get()]);
    	return view('bitacora',compact('bitacoras'));
    }


}
