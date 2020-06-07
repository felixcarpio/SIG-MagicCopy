<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'tbl_pedido';

    public function productos(){
     // return $this->belongsToMany('App\Productos');
    	return $this->belongsToMany(Productos::class,'productos_pedidos');
    }

    public function detalles(){
      return $this->hasMany('App\Detalles');
    }	
}
