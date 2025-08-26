<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase; // Ensures a clean database for each test

    public static function createUser(): User
    {
        return User::factory()->create([
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
    }
    
    public function test_that_admin_user_can_login_with_valid_credentials(): void
    {
        $admin = self::createUser();

        $response = $this->post('/admin/authenticate', [
            'email' => $admin->email,
            'password' => 'password'
        ]);

        $response->assertRedirect('admin/dashboard');
        $this->assertAuthenticatedAs($admin);
    }

    public function test_that_admin_can_create_another_admin_user(): void
    {
        $admin = self::createUser();

        $data = [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'is_admin' => true
        ];

        $response = $this->actingAs($admin, 'web')
            ->post('/admin/user/create', $data);

        $this->assertDatabaseHas('users', $data);
    }

    public function test_that_creating_user_with_missing_field_fail(): void
    {
        $admin = self::createUser();

        $data = [
            'firstname' => '',
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'is_admin' => true
        ];

        $response = $this->actingAs($admin, 'web')
            ->post('/admin/user/create', $data);

        $this->assertDatabaseMissing('users', $data);
    }

    public function test_that_admin_can_create_new_product(): void
    {
        $admin = self::createUser();

        $data = [
            'name' => fake()->name(),
            'description' => fake()->text(),
        ];

        $response = $this->actingAs($admin, 'web')
            ->post('/admin/product', $data);

        $this->assertDatabaseHas('products', $data);
    }
}
