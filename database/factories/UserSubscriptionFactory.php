<?php

namespace Database\Factories;

use App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSubscription>
 */
class UserSubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productPricing = Models\ProductPricing::factory()->create();

        return [
            'user_id' => Models\User::factory()->create()->id,
            'product_pricing_id' => $productPricing->id,
            'status' => Models\UserSubscription::PENDING,
            'subscription_date' => Carbon::now(),
            'expiration_date' => Carbon::now()->addDays($productPricing->pricingOption->duration),
        ];
    }
}
