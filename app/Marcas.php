<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = 'tbl_marca';

    public function productos(){
      return $this->belongsTo('App\Productos');
    }
}
