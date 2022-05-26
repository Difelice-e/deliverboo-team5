<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Tipology;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = Config::get('users');
        
        $tipologies = Tipology::all();
        $tipologiesId = $tipologies->pluck('id')->all();

        foreach ($users as $utente) {
            $user = new User();
            $user->email = $utente['email'];
            $user->password = Hash::make($utente['password']);
            $user->business_name = $utente['business_name'];
            $user->street_address = $utente['street_address'];
            $user->phone_number = $utente['phone_number'];
            $user->cover = $utente['cover'];
            // da risolvere p.iv con faker->vat o in array
            $user->vat_number = $faker->randomNumber(9,true);
            $user->slug = Str::slug($utente['business_name']);

            $randomInt = $faker->numberBetween(1,3);
            $randomTipologies = $faker->randomElements($tipologiesId,$randomInt);

            $user->save();
            $user->tipologies()->attach($randomTipologies);
        }
    }
}
