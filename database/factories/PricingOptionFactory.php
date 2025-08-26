<?php

namespace Database\Factories;

use App\Models\PricingOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PricingOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElements(['Monthly', 'Yearly']),
            'description' => fake()->text(),
            'duration' => fake()->randomElement(PricingOption::DURATION)
        ];
    }
}
