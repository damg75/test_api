<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;

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
            'category_id' => Category::find(rand(1, 3))->id,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];
    }
}