<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Unidad extends Model
{
    protected $table = 'productos_unidades';

    protected $fillable = [
        'producto_id', 'unidad_id','cantidad','precio_venta','costo'
    ];

    function unidad()
    {
        return $this->belongsTo(Unidad::class,'unidad_id');
    }

    function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }

}
