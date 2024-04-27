<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function places()
    {
        return $this->hasMany(Place::class, 'city_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'city_id', 'id');
    }
}
