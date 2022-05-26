<?php

use Illuminate\Database\Seeder;
use App\Tipology;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class TipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipologies = Config::get('tipologies');
        
        foreach ($tipologies as $tipologia) {
            $tipology = new Tipology();
            $tipology->name = $tipologia['name'];
            $tipology->slug = Str::slug($tipologia['name']);

            $tipology->save();
        }
    }
}
