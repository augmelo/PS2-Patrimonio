<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patrimony extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'component_id',
        'type_id',
        'ip',
        'place_id',
        'sector_id',
        'user_id',
        'note'
    ];

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
