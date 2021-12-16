<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'registration',
        'password',
        'username',
        'permission'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'role'
    ];

    public function patrimonies()
    {
        return $this->hasMany(Patrimony::class);
    }

    public function getRoleAttribute()
    {
        return $this->attributes['permission'] ? 'Administrador' : 'Comum';
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
