<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\PricingOption;
use App\Models\ProductPricing;
use App\Models\UserSubscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Ensures a clean database for each test

    public static function createUser(): User
    {
        return User::factory()->create([
            'is_admin' => false
        ]);
    }

    public static function createProductPricing(): ProductPricing
    {
        return ProductPricing::factory()->create([]);
    }

    public static function createUserSubscription(?int $count, User $user): Collection
    {
        return UserSubscription::factory($count)->create([
            'user_id' => $user->id,
        ]);
    }
    
    public function test_that_user_can_login_with_valid_credentials(): void
    {
        $user = self::createUser();

        $response = $this->post('/authenticate', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    // public function test_that_user_can_register(): void
    // {
    //     $data = [
    //         'firstname' => fake()->firstName(),
    //         'lastname' => fake()->lastName(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'password' => Hash::make('password'),
    //     ];

    //     $response = $this->post('/user/create', $data);

    //     $this->assertDatabaseHas('users', $data);
    // }

    public function test_that_user_can_subscribe_to_product(): void
    {
        $user = self::createUser();
        $product_pricing = self::createProductPricing();

        $data = [
            'product_pricing_id' => $product_pricing->id,
        ];

        $response = $this->actingAs($user, 'web')
            ->post('/product/'.$product_pricing->product->id, $data);

        $this->assertDatabaseHas('user_subscriptions', [
            'product_pricing_id' => $data['product_pricing_id'],
            'user_id' => $user->id,
        ]);
    }

    public function test_that_user_can_see_his_subscriptions(): void
    {
        $user = self::createUser();
        $subscriptions = self::createUserSubscription(3, $user);

        $response = $this->actingAs($user, 'web')
            ->get('/subscriptions');

        foreach ($subscriptions as $subscription) {
            $response->assertSee($subscription->productPricing->product->name);
        }       
    }

    
}
