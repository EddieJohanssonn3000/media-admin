<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

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
        $media = [
            'movie' => [
                'titles' => [
                    'The Last Horizon',
                    'Midnight Echo',
                    'Silent Empire',
                    'Neon Shadows',
                    'Crimson Skies'
                ],
                'categories' => ['Action', 'Drama', 'Sci-Fi', 'Horror'],
                'price_range' => [100, 250],
            ],

            'game' => [
                'titles' => [
                    'Shadow Quest',
                    'Cyber Arena',
                    'Dragon Realm',
                    'Void Legends',
                    'Steel Rebellion'
                ],
                'price_range' => [400, 800],
            ],

            'vinyl' => [
                'titles' => [
                    'Electric Dreams',
                    'Midnight Rock',
                    'Golden Classics',
                    'Retro Waves',
                    'Indie Nights'
                ],
                'price_range' => [200, 500],
            ],

            'book' => [
                'titles' => [
                    'The Silent Forest',
                    'Broken Empire',
                    'Hidden Truth',
                    'Dark Prophecy',
                    'Lost Kingdom'
                ],
                'price_range' => [100, 300],
            ],
        ];

        $type = fake()->randomElement(array_keys($media));

        $category = Category::where('type', $type)
            ->inRandomOrder()
            ->first();

        return [
            'title' => fake()->unique()->randomElement($media[$type]['titles']),
            'type' => $type,
            'category_id' => $category->id,
            'price' => fake()->numberBetween(
                $media[$type]['price_range'][0],
                $media[$type]['price_range'][1]
            ),
            'release_year' => fake()->numberBetween(1980, 2024),
            'stock' => fake()->numberBetween(0, 100),
            'description' => fake()->sentence(12),
        ];
    }
}
