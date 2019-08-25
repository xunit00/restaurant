<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleReceta extends Model
{
    use SoftDeletes;

    protected $table = 'receta_detalles';

    protected $dates=['deleted_at'];

    protected $fillable = [
        'receta_id', 'producto_id','unidad_id','cantidad'
    ];

    public function receta()
    {
        return $this->belongsTo(Receta::class,'receta_id');
    }

    public function producto()
    {
        return $this->hasMany(Producto::class,'producto_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class,'unidad_id');
    }
}
