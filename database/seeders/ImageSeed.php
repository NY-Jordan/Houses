<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG935428',
            'post_id' => 1,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG935428',
            'post_id' => 2,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG541413',
            'post_id' => 3,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG335154',
            'post_id' => 4,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG335154',
            'post_id' => 5,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG383102',
            'post_id' => 6,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG921991',
            'post_id' => 7,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG921991',
            'post_id' => 8,
        ]);
        DB::table('images')->insert([
            'path' => 'ImagesPost/Theophile NGUEKENG/imageTheophile NGUEKENG38914',
            'post_id' => 9,
        ]);
        
    }
}
