<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class ComprobanteSecuencia extends Model
{
    use SearchTrait;

    protected $fillable = [
        'secuencia','tipo_id','status','fecha_vencimiento'
    ];

    public function tipoComprobante()
    {
        return $this->belongsTo(ComprobanteTipo::class,'tipo_id');
    }
}