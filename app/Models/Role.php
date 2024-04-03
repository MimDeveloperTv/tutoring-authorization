<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['owner_id','name','created_by'];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission','role_id');
    }

    public function scopeOwned($query,$owner_id)
    {
        return $query->where('owner_id',$owner_id);
    }
}
