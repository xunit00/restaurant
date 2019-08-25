<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesa extends Model
{
    use SoftDeletes;

    use SearchTrait;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'nombre', 'cubiertos','area_id','status'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
}
