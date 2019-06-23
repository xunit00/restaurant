<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Unidad extends Model
{
    protected $table = 'productos_unidades';

    protected $fillable = [
        'id_producto', 'id_unidad','cantidad','precio_venta','costo'
    ];

    function unidades()
    {
        return $this->belongsToMany(Unidad::class);
    }

    function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

}
