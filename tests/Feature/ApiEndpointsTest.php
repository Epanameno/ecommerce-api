<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_login(): void
    {
        $registerResponse = $this->postJson('/api/register', [
            'name' => 'Ana García',
            'email' => 'ana@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $registerResponse
            ->assertStatus(201)
            ->assertJsonPath('user.email', 'ana@example.com');

        $this->assertDatabaseHas('users', [
            'email' => 'ana@example.com',
        ]);

        $loginResponse = $this->postJson('/api/login', [
            'email' => 'ana@example.com',
            'password' => 'secret123',
        ]);

        $loginResponse
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'user' => ['id', 'name', 'email'],
            ]);
    }

    public function test_authenticated_user_can_list_and_create_products(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'api');

        $createResponse = $this->postJson('/api/products', [
            'name' => 'Mouse inalámbrico',
            'description' => 'Mouse USB para portátiles',
            'price' => 29.99,
            'stock' => 25,
        ]);

        $createResponse
            ->assertStatus(201)
            ->assertJsonPath('product.name', 'Mouse inalámbrico');

        $this->assertDatabaseHas('products', [
            'name' => 'Mouse inalámbrico',
        ]);

        $listResponse = $this->getJson('/api/products');

        $listResponse
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Mouse inalámbrico',
            ]);
    }
}
