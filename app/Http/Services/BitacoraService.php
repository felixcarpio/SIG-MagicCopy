<?php

namespace App\Http\Services;
use App\Bitacora;
use Carbon\Carbon;
class BitacoraService {

	 public function bitacoraPost($accion){
    	 $user = auth()->user();
    	 $bitacora = new Bitacora;
    	 //$bitacora->usuario =  $user->name;
    	 //$bitacora->nombre = $user->name;
    	 $bitacora->usuario =  'Salvador';
    	 $bitacora->nombre = 'Salvador Ramos';
    	 $bitacora->fecha_acceso = Carbon::now();
    	 $bitacora->accion = $accion;
    	 $bitacora->save();
    }
}