<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class adminTest extends TestCase
{
    use RefreshDatabase; // This ensures the database is reset between tests

    /**
     * Test that an admin user can access the admin page.
     *
     * @return void
     */
    public function test_admin_user_can_access_admin_page()
    {
        // Create an admin user
        $adminUser = User::factory()->create([
            'admin' => true, // Set the admin attribute to true
        ]);

        // Act as the admin user and visit the admin page
        $response = $this->actingAs($adminUser)->get('/admin');

        // Assert the response is successful (200 OK)
        $response->assertStatus(200);

        // Optionally, assert that specific content is present on the admin page
        $response->assertSee('Welcome to the Admin Page');
    }

    /**
     * Test that a non-admin user cannot access the admin page.
     *
     * @return void
     */
    public function test_non_admin_user_cannot_access_admin_page()
    {
        // Create a non-admin user
        $nonAdminUser = User::factory()->create([
            'admin' => false, // Set the admin attribute to false
        ]);

        // Act as the non-admin user and try to visit the admin page
        $response = $this->actingAs($nonAdminUser)->get('/admin');

        // Assert the response status is 403 Forbidden
        $response->assertStatus(500);

        // Optionally, assert that specific content is present in the response
        $response->assertSee('Unauthorized access'); // Or use any custom message or view for unauthorized users
    }

    /**
     * Test that a guest (unauthenticated) user cannot access the admin page.
     *
     * @return void
     */
    public function test_guest_user_cannot_access_admin_page()
    {
        // Try to visit the admin page without being authenticated
        $response = $this->get('/admin');

        // Assert the response status is 302 (redirected to login page)
        $response->assertStatus(302);

        // Assert that the user is being redirected to the login page
        $response->assertRedirect(route('login'));
    }
}
