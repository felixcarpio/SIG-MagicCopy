<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = 'marcas';

    public function productos(){
      return $this->belongsTo('App\Productos');
    }
}
