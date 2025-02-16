<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_name',
        'price',
        'discout_percentage',
        'pro_image',
        'category_id'
    ];

    public function category(){
       return  $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
