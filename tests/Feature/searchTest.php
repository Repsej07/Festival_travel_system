<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;


class SearchTest extends TestCase
{

    /**
     * Test that the admin index page can be accessed by an admin user.
     *
     * @return void
     */
    public function test_admin_index_page_can_be_accessed_by_admin_user()
    {
        $adminUser = User::factory()->create(['admin' => true]);

        $response = $this->actingAs($adminUser)->get('/admin');

        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }

    /**
     * Test that the admin index page cannot be accessed by a non-admin user.
     *
     * @return void
     */
    public function test_admin_index_page_cannot_be_accessed_by_non_admin_user()
    {
        $nonAdminUser = User::factory()->create(['admin' => false]);

        $response = $this->actingAs($nonAdminUser)->get('/admin');

        $response->assertStatus(403);
    }

    /**
     * Test that the admin index page cannot be accessed by a guest user.
     *
     * @return void
     */
    public function test_admin_index_page_cannot_be_accessed_by_guest_user()
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * Test the search users functionality.
     *
     * @return void
     */
    public function test_search_users_functionality()
{
    $adminUser = User::factory()->create(['admin' => true]);
    $searchTerm = 'John';

    // Create test users
    $john = User::factory()->create(['first_name' => 'John', 'last_name' => 'Doe']);
    User::factory()->create(['first_name' => 'Jane', 'last_name' => 'Doe']);

    // Make the search request
    $response = $this->actingAs($adminUser)->get("/admin/searchusers?search={$searchTerm}");

    // Assert the response
    $response->assertStatus(200);
    $response->assertJsonStructure(['users']);

    $results = $response->json('users');
    $this->assertCount(1, $results);
    $this->assertEquals($john->id, $results[0]['id']);
    $this->assertEquals('John', $results[0]['first_name']);
}

}
