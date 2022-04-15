<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryName' => 'Studio',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Room',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Appartment',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'House',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Office space',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Store',
        ]);
        

    }
}
