<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_admin_routes(): void
    {
        // Create an admin user
        $admin = User::factory()->create([
            'admin' => true,
        ]);

        // Acting as the admin user
        $response = $this->actingAs($admin)->get('/admin');

        // Assert admin can access the page
        $response->assertStatus(200);
    }

    public function test_non_admin_cannot_access_admin_routes(): void
    {
        // Create a regular user
        $user = User::factory()->create([
            'admin' => false,
        ]);

        // Acting as the non-admin user
        $response = $this->actingAs($user)->get('/admin');

        // Assert non-admin is redirected
        $response->assertStatus(403);
    }

    public function test_guest_cannot_access_admin_routes(): void
    {
        // Guest tries to access the admin page
        $response = $this->get('/admin');

        // Assert guest is redirected
        $response->assertRedirect('/login'); // Assuming guest is redirected to login
    }
}
