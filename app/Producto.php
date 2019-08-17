<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SearchTrait;

    use SoftDeletes;

    protected $dates=['deleted_at'];

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

}
