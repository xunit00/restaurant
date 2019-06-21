<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre_producto', 'descripcion_producto','id_categoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public function unidad()
    {
        return $this->belongsToMany(Unidad::class,'productos_vs_unidades');
    }
}
