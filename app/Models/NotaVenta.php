<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class NotaVenta extends Model
{
    use SoftDeletes;

    use SoftCascadeTrait;

    use SearchTrait;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'cliente_id', 'usuario_id','fecha','total'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class,'cliente_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }

    function detalles()
    {
        return $this->hasMany(DetalleNotaVenta::class);
    }
}
