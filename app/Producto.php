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

    function productos_unidades()
    {
        return $this->belongsToMany(Producto_Unidad::class, 'productos_unidades', 'producto_id', 'unidad_id');
    }

}
