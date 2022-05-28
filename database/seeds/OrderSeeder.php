<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;
use App\User;
use App\Dish;
use Illuminate\Support\Facades\DB;

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
            $order->total_price = $faker->randomNumber(2,false);
            $order->delivery_time = null;
            $order->delivered = $faker->boolean();

            $order->save();

            // recupero id piatti
            $dishes = Dish::where('user_id',$order->user_id);
            $dishesId = $dishes->pluck('id')->all();

            // generazione random piatti
            $randomInt = $faker->numberBetween(1,2);
            $randomDishes = $faker->randomElements($dishesId,$randomInt);
            
            // ciclo creazione righe tabella pivot
            foreach ($randomDishes as $randomDish) {
                DB::table('dish_order')->insert([
                    'dish_id' => $randomDish,
                    'order_id' => $order->id,
                    'quantity' => $faker->numberBetween(1,3) 
                ]);
            }
            
            // $ordered = Order::where('id',$order->id)->get();
            // $orderedDishesId[] = $ordered->pivot->dish_id;
            
            // foreach ($orderedDishesId as $orderedDishId) {
            //     $orderedDish = Dish::where('id',$orderedDishId);
            //     $dishPrice = $orderedDish->price * $orderedDish->pivot->quantity;
                
            //     $totalDishPrice += $dishPrice;
            //     $order->totalPrice = $totalDishPrice;
            // }

            
            // $order->update($order->totalPrice);
            
        }
    }
}
