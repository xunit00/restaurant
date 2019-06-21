<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
