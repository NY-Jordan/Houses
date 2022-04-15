<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'CityName' => 'yaoundé',
        ]);
        
        DB::table('cities')->insert([
            'CityName' => 'Douala',
        ]);
        DB::table('cities')->insert([
            'CityName' => 'Bamenda',
        ]);
        DB::table('cities')->insert([
            'CityName' => 'Buea',
        ]);
        DB::table('cities')->insert([
            'CityName' => 'Limbe',
        ]);
    }
}
