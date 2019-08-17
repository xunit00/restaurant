<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plato extends Model
{
    use SearchTrait;

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'nombre', 'descripcion','id_categoria','precio','status'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public function receta()
    {
        return $this->hasOne(Receta::class);
    }
}
