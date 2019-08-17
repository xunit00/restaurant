<?php

namespace App;

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

    protected $softCascade=['productos'];

    protected $table = 'unidades';

    protected $fillable = [
        'nombre', 'descripcion','contenido', 'status',
    ];

    function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
