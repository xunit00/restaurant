<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;

class ComprobanteTipo extends Model
{
    use SearchTrait;

    use SoftCascadeTrait;

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $softCascade=['comprobante_secuencias'];

    protected $fillable = [
        'serie_tipo','status','descripcion'
    ];

    public function secuencias()
    {
        return $this->hasMany(ComprobanteSecuencia::class);
    }
}
