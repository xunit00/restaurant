<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use SearchTrait;

    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function platos()
    {
        return $this->hasMany(Plato::class);
    }
}
