<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'movie' => ['Action', 'Drama', 'Sci-Fi', 'Horror'],
            'game' => ['RPG', 'Adventure', 'Strategy', 'Action'],
            'vinyl' => ['Rock', 'Pop', 'Jazz', 'Electronic'],
            'book' => ['Fantasy', 'Thriller', 'Mystery', 'Romance'],
        ];

        foreach ($categories as $type => $names) {
            foreach ($names as $name) {
                Category::create([
                    'name' => $name,
                    'type' => $type,
                ]);
            }
        }
    }
}
