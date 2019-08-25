<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SearchTrait;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;


class Receta extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['detalles'];

    protected $fillable = [
        'producto_id','descripcion','porciones', 'status'
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleReceta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
