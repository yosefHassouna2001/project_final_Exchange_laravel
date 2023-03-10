<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory ,SoftDeletes;

    public function currency(){
        return $this->belongsTo(Currency::class , 'currency_id' , 'id');
    }

}
