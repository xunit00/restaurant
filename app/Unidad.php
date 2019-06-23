<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'nombre_unidad', 'descripcion_unidad','contenido', 'status',
    ];

    function productos_unidades()
    {
        return $this->belongsToMany(Producto_Unidad::class, 'productos_unidades', 'producto_id', 'unidad_id');
    }

}
