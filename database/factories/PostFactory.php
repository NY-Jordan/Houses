<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        return [
            

            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph(10),
            'rent_per_month' =>  random_int(1,100000),
            'advance_payment' => random_int(1,12),
            'phonenumber' => random_int(1, 9),
            'user_id' => User::factory(),
            'category_id' => random_int(1, 6),
            'city_id' => random_int(1,5),
            'location' => 'efoulan',
            'email' => 'test@yahoo.fr',
               
           
        ];
    }
}
