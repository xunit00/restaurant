<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobanteSecuencia extends Model
{
    protected $fillable = [
        'secuencia','tipo_id','status'
    ];

    public function tipoComprobanteSecuencia()
    {
        return $this->belongsTo(ComprobanteSecuencia::class,'tipo_id');
    }
}
