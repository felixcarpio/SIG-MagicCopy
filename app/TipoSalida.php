<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSalida extends Model
{
    protected $table = 'tipo_salidas';

    public function salidas(){
      return $this->hasMany('App\Salidas');
    }
}
