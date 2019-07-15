<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'nombre_unidad', 'descripcion_unidad','contenido', 'status',
    ];

    function productos()
    {
        return $this->belongsToMany(Producto::class,'productos_unidades')
        ->withPivot('cantidad', 'precio_venta','costo')->withTimestamps();
    }

}
