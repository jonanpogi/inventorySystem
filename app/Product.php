<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Product extends Model
{
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
