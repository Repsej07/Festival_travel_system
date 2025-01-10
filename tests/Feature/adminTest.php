<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function test_admin_user_can_access_admin_page()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'admin' => true, // Make sure admin is true
            'password' => Hash::make('password'), // Provide password
        ]);

        // Log in the admin user
        $response = $this->actingAs($admin)
                         ->get('/admin');

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the page contains the expected text
        $response->assertSee('Welcome to the Admin Page');
    }
}
