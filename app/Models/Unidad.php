<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Unidad extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['insumos'];

    protected $table = 'unidades';

    protected $fillable = [
        'nombre', 'descripcion','contenido', 'status',
    ];

    function insumos()
    {
        return $this->hasMany(Insumo::class);
    }

}
