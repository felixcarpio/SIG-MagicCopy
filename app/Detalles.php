<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';

    public function salida(){
      return $this->belongsTo('App\Salidas');
    }

    public function pedidos(){
      return $this->belongsTo('App\Pedidos');
    }
}
