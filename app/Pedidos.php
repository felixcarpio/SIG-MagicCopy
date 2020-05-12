<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    public function productos(){
      return $this->belongsToMany('App\Productos');
    }

    public function detalles(){
      return $this->hasMany('App\Detalles');
    }
}
