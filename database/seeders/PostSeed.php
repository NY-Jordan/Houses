<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name' => 'House title1',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'efoulan',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title2',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'nsam',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title3',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'essos',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title4',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'obam',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title5',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'efoulan',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title6',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'efoulan',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title7',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'odza',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title8',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'olympique',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
        DB::table('posts')->insert([
            'name' => 'House title9',
            'description' => Str::random(100),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => 1,
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'nsimeyong',
            'email' => 'yvanjordannguetse@yahoo.fr'

        ]);
    }
}
