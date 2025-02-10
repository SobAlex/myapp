<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::get()->random()->id,
            'category_id' => Category::get()->random()->id,
            'slug' => $this->faker->word(),
            'title' => $this->faker->text(10),
            'content' => $this->faker->text(500),
            'isPublick' => 1,
        ];
    }
}
