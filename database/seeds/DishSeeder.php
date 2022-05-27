<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $dishes = Config::get('dishes');
            
            foreach ($dishes as $piatto) {

                $dish = new Product();
                    
                $dish->name = $piatto['name'];
                $dish->slug = Str::slug($piatto['name']);
                $dish->cover = $piatto['cover'];
                foreach ($piatto['ingredients'] as $ingrediente) {
                    $dish->ingredients += $ingrediente;
                }
                $dish->description = $piatto['description'];
                $dish->price = $piatto['price'];
                $dish->visibility = $piatto['visibility'];
                $dish->user_id = $piatto['user_id'];
                
                $dish -> save();
            }
    }
}

