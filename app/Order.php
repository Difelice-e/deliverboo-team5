<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes() {
        return $this->belongsToMany(Dish::class)
        ->withPivot('quantity');
    }

    public function sumTotal(){

       

    }
}
