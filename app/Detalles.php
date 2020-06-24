<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'tbl_detalle';

    public function salida(){
      return $this->belongsTo('App\Salidas');
    }

    public function pedidos(){
      return $this->belongsTo('App\Pedidos');
    }
}
