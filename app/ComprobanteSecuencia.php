<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobanteSecuencia extends Model
{
    protected $fillable = [
        'secuencia','tipo_id','status','fecha_vencimiento'
    ];

    public function tipoComprobante()
    {
        return $this->belongsTo(ComprobanteTipo::class,'tipo_id');
    }
}
