<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory ,SoftDeletes;

    public function prices(){
        return $this->hasMany(Price::class , 'currency_id' , 'id');
    }

}
