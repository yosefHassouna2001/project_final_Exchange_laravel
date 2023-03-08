<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory ,SoftDeletes;
    public function country(){
        return $this->belongsTo(Country::class , 'country_id' , 'id');
    }

    public function users(){
        return $this->hasMany(User::class );
    }

    public function branches(){
        return $this->hasMany(City::class , 'city_id' , 'id');
    }


    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
