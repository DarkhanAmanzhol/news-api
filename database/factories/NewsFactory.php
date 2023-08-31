<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $news_categories = NewsCategory::all()->pluck('id')->toArray();

        return [
            'category_id' => fake()->randomElement($news_categories),
            'header' => fake()->text(15),
            'body' => fake()->text(120),
            'preview' => fake()->text(40),
            'date_published' => fake()->randomElement([fake()->date(), null]),
            'views' => rand(0, 1000),
        ];
    }
}
