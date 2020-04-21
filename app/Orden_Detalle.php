<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden_Detalle extends Model
{
    protected $fillable = [
        'orden_id', 'plato_id', 'cantidad'
    ];
}
