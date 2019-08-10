<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use SearchTrait;

    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }
}
