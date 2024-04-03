<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticable
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['uuid'];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'user_permission');
    }
}
