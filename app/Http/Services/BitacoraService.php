<?php

namespace App\Http\Services;
use App\Bitacora;
class BitacoraService {

	 public function bitacoraPost($accion){
    	 $user = auth()->user();
    	 $bitacora = new Bitacora;
    	 $bitacora->usuario =  $user->name;
    	 $bitacora->nombre = $user->name;
    	 $bitacora->fecha_acceso = Carbon\Carbon::now();
    	 $bitacora->accion = $accion;
    	 $bitacora->save();
    }
}