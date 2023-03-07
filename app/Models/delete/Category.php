<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function articles(){
        return $this->hasMany(Article::class)->take(3)->orderBy('created_at' , 'desc');
        // return $this->hasMany(Article::class , 'category_id' , 'id');

    }

    // return $this->hasMany(Article::class)->take(3)->orderBy('created_at' , 'desc');

}
