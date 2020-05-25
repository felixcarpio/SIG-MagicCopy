<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
class BitacoraController extends Controller
{
    public function bitacora(){
    	//$bitacora = Bitacora::orderBy('id','ASC')->get();

    return view('bitacora',['bitacoras'=>Bitacora::orderBy('id','DESC')->get()]);
    }


}
