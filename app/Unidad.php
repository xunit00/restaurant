<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'nombre_unidad', 'descripcion_unidad','contenido', 'status',
    ];

    public function producto()
    {
        return $this->belongsToMany(Producto::class,'productos_vs_unidades');
    }

}
