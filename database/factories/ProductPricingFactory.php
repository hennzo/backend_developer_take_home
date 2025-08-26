<?php

namespace Database\Factories;

use App\Models;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPricing>
 */
class ProductPricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Models\Product::factory()->create([])->id,
            'pricing_option_id' => Models\PricingOption::factory()->create([])->id,
            'amount' => fake()->randomNumber(3),
        ];
    }
}
