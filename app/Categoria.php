<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Categoria extends Model
{
    use SearchTrait;

    use SoftDeletes;

    use SoftCascadeTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['productos','platos'];

    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function platos()
    {
        return $this->hasMany(Plato::class);
    }
}
