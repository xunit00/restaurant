<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Producto extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $softCascade=['receta'];

    protected $dates=['deleted_at'];

    protected $fillable = [
        'nombre', 'descripcion','categoria_id','precio','status'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriasProducto::class,'categoria_id');
    }

    public function receta()
    {
        return $this->hasOne(Receta::class);
    }

    function detalleNotaVenta()
    {
        return $this->hasMany(DetalleNotaVenta::class);
    }
}
