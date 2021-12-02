<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PostSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();
        $this->call([
            CategorySeeder::class,
            CitySeed::class,
            UserSeeder::class,
            PostSeed::class,
            ImageSeed::class
        ]);
    }
}
