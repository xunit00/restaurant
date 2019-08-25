<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class CategoriasInsumo extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['insumos'];

    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function insumos()
    {
        return $this->hasMany(Insumo::class);
    }
}
