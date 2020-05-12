<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table ='entidades';

    public function salidas(){
      return $this->belongsToMany('App\Salidas');
    }
}
