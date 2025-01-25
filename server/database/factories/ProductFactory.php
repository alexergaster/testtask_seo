<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomFloat(2, 10),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::inRandomOrder()->value('id'),
        ];
    }
}
