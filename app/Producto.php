<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use SearchTrait;

    protected $fillable = [
        'nombre_producto', 'descripcion_producto','id_categoria','imagen'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    function unidad()
    {
        return $this->belongsToMany(Unidad::class,'productos_unidades');
    }

}
