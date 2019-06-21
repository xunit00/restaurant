<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Unidad extends Model
{
    protected $fillable = [
        'id_producto', 'id_unidad','cantidad','precio_venta','costo'
    ];

}
