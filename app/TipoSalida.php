<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSalida extends Model
{
    protected $table = 'tbl_tipo_salida';

    public function salidas(){
      return $this->hasMany('App\Salidas');
    }
}
