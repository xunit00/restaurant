<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'nombre','descripcion', 'status'
    ];

    public function detalles()
    {
        return $this->hasMany(detalleReceta::class);
    }
}
