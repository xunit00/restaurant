<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComprobanteSecuencia extends Model
{
    use SearchTrait;

    use SoftDeletes;

    protected $fillable = [
        'secuencia','tipo_id','status','fecha_vencimiento'
    ];

    public function tipoComprobante()
    {
        return $this->belongsTo(ComprobanteTipo::class,'tipo_id');
    }
}
