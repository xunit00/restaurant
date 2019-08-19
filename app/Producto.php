<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


class Producto extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['receta'];

    protected $fillable = [
        'nombre', 'descripcion','categoria_id',
        'imagen','unidad_id','existencia','maximo',
        'reorden','minimo','precio_venta','costo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    function unidad()
    {
        return $this->belongsTo(Unidad::class,'unidad_id');
    }

    function receta()
    {
        return $this->hasMany(DetalleReceta::class,'producto_id');
    }

    function detalleNotaVenta()
    {
        return $this->hasMany(DetalleNotaVenta::class);
    }
}
