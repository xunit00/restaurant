<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use SearchTrait;

    protected $fillable = [
        'nombre', 'descripcion','id_categoria','precio','status'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
}
