<?php

namespace App;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{

    use SearchTrait;

    protected $fillable = [
        'nombre', 'cubiertos','area_id','status'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
}
