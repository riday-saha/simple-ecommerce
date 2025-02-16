<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'rec_address',
        'phone',
        'status',
        'users_id',
        'products_id'
    ];

    public function Production(){
        return $this->belongsTo(Product::class,'products_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}
