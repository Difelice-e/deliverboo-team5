<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes() {
        return $this->belongsToMany(Dish::class)
        ->withPivot('quantity');
    }

    // public function sumTotal(){

    // }

    protected $fillable = [
        'customer_name',
        'street_address',
        'customer_email',
        'customer_phone',
        'payment_state',
        'user_id', 
        'total_price',
        'delivered',
        'delivery_time'
    ];
}
