<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory ,SoftDeletes;
    
    public function city(){
        return $this->belongsTo(City::class, 'city_id' , 'id');
    }

}
