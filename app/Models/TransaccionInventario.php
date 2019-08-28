<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class TransaccionInventario extends Model
{

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['usuario'];

    protected $fillable = [
        'usuario_id', 'tipo_transaccion','concepto', 'status'
    ];

    function detalle()
    {
        return $this->hasMany(TransaccionInventarioDetalle::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }
}
