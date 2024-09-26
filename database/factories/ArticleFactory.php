<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomCategory = Category::all()->random();
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'shortDescription' => $this->faker->paragraph(),
            'mainImage' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['published', 'draft']),
            'categoryId' => $randomCategory->getId(),
        ];
    }
}
