<?php

namespace App\Http\Services;
use App\Bitacora;
use Carbon\Carbon;
use Auth;
class BitacoraService {

	 public function bitacoraPost($accion){

    	 $bitacora = new Bitacora;
         $bitacora->usuario = Auth::user()->username;
         $bitacora->nombre = Auth::user()->name." ".Auth::user()->surname;
    	 $bitacora->fecha_acceso = Carbon::now();
    	 $bitacora->accion = $accion;
    	 $bitacora->save();
    }
}