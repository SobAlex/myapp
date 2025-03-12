<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'detail_path' => 'resources/images/default.jpeg',
            'preview_path' => 'resources/images/default.jpeg',
            'imageable_id' => rand(1, 30),
            'imageable_type' => 'App\Models\Post',
        ];
    }
}
