<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;
use App\User;
use App\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        // recupero id ristoranti
        $users = User::all();
        $usersId = $users->pluck('id')->all();

        for ($i = 0; $i < 50; $i++) {
            $order = new Order();

            $order->user_id = $faker->randomElement($usersId);
            $order->customer_name = $faker->userName();
            $order->customer_email = $faker->email();
            $order->street_address = $faker->streetAddress();
            $order->customer_phone = $faker->e164PhoneNumber();
            
            // recupero id piatti
            $dishes = Dish::with('user_id',$order->user_id);
            $dishesId = $dishes->pluck('id')->all();

            // generazione random piatti
            $randomInt = $faker->numberBetween(1,2);
            $randomDishes = $faker->randomElements($dishesId,$randomInt);

            $order->total_price = $faker->randomNumber(3,false);
            $order->delivery_time = null;
            $order->delivered = $faker->boolean();

            $order->save();

            // inserimento piatti in tabella
            $order->dishes()->attach($randomDishes);
            $order->dishes()->quantity = 2;
            
        }
    }
}
