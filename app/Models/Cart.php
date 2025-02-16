<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function Production(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
