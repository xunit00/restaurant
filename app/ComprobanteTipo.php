<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobanteTipo extends Model
{
    protected $fillable = [
        'serie_tipo','status'
    ];

    public function secuencias()
    {
        return $this->hasMany(ComprobanteSecuencia::class);
    }
}
