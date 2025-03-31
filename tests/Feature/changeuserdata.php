<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class changeuserdata extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_cant_access_admin_dashboard(){

        $user = User::factory()->create([
            'admin' => 0,
        ]);

        $this->actingAs($user);

        $response = $this->get('/admin/');

        $response->assertStatus(403);
    }
}
