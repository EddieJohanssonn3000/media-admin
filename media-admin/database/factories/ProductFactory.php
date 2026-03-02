<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['movie', 'game', 'vinyl', 'book'];

        $categories = [
            'Action',
            'Drama',
            'Sci-Fi',
            'RPG',
            'Rock',
            'Fantasy',
            'Horror'
        ];

        return [
            'title' => fake()->sentence(3),
            'type' => fake()->randomElement($types),
            'category' => fake()->randomElement($categories),
            'price' => fake()->numberBetween(50, 1000),
            'release_year' => fake()->numberBetween(1950, 2024),
            'stock' => fake()->numberBetween(0, 100),
            'description' => fake()->paragraph(),
        ];
    }
}
