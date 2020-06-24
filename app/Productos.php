<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
  protected $table ='tbl_producto';

    public function marca(){
      return $this->hasOne('App\Marcas');
    }

    public function categorias(){
      return $this->belongsTo('App\Categorias');
    }

    public function proveedores(){
      return $this->belongsToMany('App\Proveedores');
    }

    public function pedidos(){
      return $this->belongsToMany(Pedidos::class,'productos_pedidos');
    }
}
