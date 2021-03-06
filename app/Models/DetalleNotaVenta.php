<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleNotaVenta extends Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'nota_venta_id', 'producto_id','cantidad','precio','descuento'
    ];

    public function venta()
    {
        return $this->belongsTo(NotaVenta::class,'nota_venta_id');
    }

    function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
