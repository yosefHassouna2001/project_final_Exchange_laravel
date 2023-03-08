<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory ,SoftDeletes;

    public function cities(){
        return $this->hasMany(City::class , 'country_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($country) {
            $country->cities()->delete();

        });
    }
}
