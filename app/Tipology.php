<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Tipology extends Model
{
    // funzione di creazione slug
    public static function getUniqueSlug($name) {
        $slug = Str::slug($name);
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

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }
}


