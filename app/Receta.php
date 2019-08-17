<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SearchTrait;

class Receta extends Model
{
    use SearchTrait;

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'plato_id','descripcion','porciones', 'status'
    ];

    public function detalles()
    {
        return $this->hasMany(detalleReceta::class);
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class,'plato_id');
    }
}
