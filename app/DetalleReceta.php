<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    protected $fillable = [
        'receta_id', 'producto_id','unidad_id','cantidad'
    ];

    public function receta()
    {
        return $this->belongsTo(Receta::class,'receta_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class,'unidad_id');
    }
}
