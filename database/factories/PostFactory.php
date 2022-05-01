<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->title,
            'slug' => $this->faker->slug,
            'body' => $this->faker->text,
            'sort_description' => $this->faker->text(50),
            'image' => $this->faker->imageUrl(),
            'is_active' => rand(0,1)
        ];
    }
}
