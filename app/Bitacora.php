<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'tbl_bitacora';

    protected $fillable = [
      'usuario','nombre','fecha_acceso','accion'
    ];
}
