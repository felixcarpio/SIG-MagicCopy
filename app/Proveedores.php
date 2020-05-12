<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    public function productos(){
      return $this->belongsToMany('App\Productos');
    }
}
