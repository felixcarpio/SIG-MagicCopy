<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compradores extends Model
{
    protected $table='compradores';

    public function salidas(){
      return $this->belongsToMany('App\Salidas');
    }
}
