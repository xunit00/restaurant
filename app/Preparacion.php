<?php

namespace App;

use App\Models\Insumo;
use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    protected $fillable = [
        'insumo_id', 'tipo_preparacion', 'tiempo'
    ];

    function insumo()
    {
        return $this->belongsTo(Insumo::class,'insumo_id');
    }
}
