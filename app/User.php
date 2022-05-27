<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    
    // funzione di creazione slug 
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

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password',
        'business_name',
        'vat_number',
        'street_address',
        'phone_number',
        'cover',
        'slug'
    ];

    // relazione con tipologie
    public function tipologies() {
        return $this->belongsToMany('App\Tipology');
    }

    // relazione con piatti
    public function dishes(){
        return $this->hasMany('App\Dish');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
