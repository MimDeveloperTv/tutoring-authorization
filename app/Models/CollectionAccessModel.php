<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CollectionAccessModel extends Model
{
    protected $fillable = ['collection_id','model_type','model_id'];
    public function collection() : HasOne
    {
        return $this->hasOne(UserCollection::class);
    }
}
