<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // relazione con utenti
    public function users(){
        return $this->belongsTo('App\User');
    }

    // generazione slug 
    public static function getUniqueSlug($business_name) {
        $slug = Str::slug($business_name);
        $slug_base = $slug;
        
        $counter = 1;

        $user_present = User::where('slug',$slug)->first();
        
        while ($user_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $user_present = User::where('slug',$slug)->first();
        }

        return $slug;
    }
}
