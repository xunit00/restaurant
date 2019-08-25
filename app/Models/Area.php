<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Area extends Model
{
    use SoftDeletes;

    use SoftCascadeTrait;

    use SearchTrait;

    protected $dates=['deleted_at'];

    protected $softCascade=['mesas'];

    protected $fillable = [
        'nombre', 'descripcion', 'status',
    ];

    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }
}
