<?php

namespace Database\Factories;

use App\Models\Product;
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
    protected $model = Product::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // ✅ Ensure name is generated
            'description' => $this->faker->sentence,
            'sku' => $this->faker->unique()->word,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
