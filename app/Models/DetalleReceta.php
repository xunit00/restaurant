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
        'receta_id', 'insumo_id','unidad_id','cantidad'
    ];

    public function receta()
    {
        return $this->belongsTo(Receta::class,'receta_id');
    }

    public function insumo()
    {
        return $this->hasMany(Insumo::class,'insumo_id');
    }
}
