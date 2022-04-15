<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => 'imagesPost/'.$this->faker->image('public/storage/imagesPost',640,480, null, false),
            'post_id' => Post::factory(),
        ];
    }
}
