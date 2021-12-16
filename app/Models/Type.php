<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'component_id'
    ];

    public function patrimonies()
    {
        return $this->hasMany(Patrimony::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
