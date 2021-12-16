<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function patrimonies()
    {
        return $this->hasMany(Patrimony::class);
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
