<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class TransaccionInventarioDetalle extends Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'transaccion_id', 'insumo_id','cantidad'
    ];

    public function transaccion()
    {
        return $this->belongsTo(TransaccionInventario::class,'transaccion_id');
    }

    function insumo()
    {
        return $this->hasMany(Insumo::class,'insumo_id');
    }
}
