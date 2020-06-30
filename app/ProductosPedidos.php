<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosPedidos extends Model
{
    protected $table = 'tbl_producto_pedido';

    public function productos(){
        return $this->belongsToMany('App\Productos');
    }
}
