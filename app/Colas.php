<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colas extends Model
{
    protected $fillable = [
        'num_orden', 'tiempo_preparacion', 'descripcion_plato','receta_id'
    ];
}
