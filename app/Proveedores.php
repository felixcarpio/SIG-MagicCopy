<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'tbl_proveedor';

    public function productos(){
      return $this->belongsToMany('App\Productos');
    }
}
