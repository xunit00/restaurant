<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class ComprobanteTipo extends Model
{
    use SearchTrait;

    protected $fillable = [
        'serie_tipo','status','descripcion'
    ];

    public function secuencias()
    {
        return $this->hasMany(ComprobanteSecuencia::class);
    }
}
