<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create([
            'admin' => 1,
        ]);

        $this->actingAs($admin);

        $response = $this->get('/admin/');

        $response->assertStatus(200);
    }
    public function test_user_cant_access_admin_dashboard(){

        $user = User::factory()->create([
            'admin' => 0,
        ]);

        $this->actingAs($user);
        //test if the user can access the admin dashboard
        $response = $this->get('/admin/');
        $response->assertStatus(403);
    }
}
