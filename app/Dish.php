<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    // relazione con utenti
    public function users(){
        return $this->belongsTo('App\User');
    }

    // relazione con ordini
    public function orders() {
        return $this->belongsToMany('App\Order');
    }

    // generazione slug 
    public static function getUniqueSlug($name) {
        $slug =Str::slug($name);
        $slug_base = $slug;
        
        $counter = 1;

        $dish_present = dish::where('slug',$slug)->first();
        
        while ($dish_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $dish_present = dish::where('slug',$slug)->first();
        }

        return $slug;
    }
}
