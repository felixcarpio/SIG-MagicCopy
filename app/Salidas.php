<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salidas extends Model
{
    protected $table ='tbl_salida';

    public function detalles(){
      return $this->hasMany('App\Detalles');
    }

    public function tipo_salidas(){
      return $this->belongsTo('App\TipoSalida');
    }

    public function compradores(){
      return $this->belongsToMany('App\Compradores');
    }

    public function entidades(){
      return $this->belongsToMany('App\Entidades');
    }
}
