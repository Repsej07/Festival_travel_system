<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Festival;
use App\Models\Busreizen;

class CreateDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_creation(): void
    {
        // Create a user
        $user = User::factory()->create();

        // Assert the user exists in the database
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }

    public function test_festival_creation(): void
    {
        // Create a festival
        $festival = Festival::factory()->create();

        // Assert the festival exists in the database
        $this->assertDatabaseHas('festivals', [
            'name' => $festival->name,
        ]);
    }

    public function test_busreis_creation(): void
    {
        $festival = Festival::factory()->create();
        $busreis = Busreizen::factory()->create([
            'festival_id' => $festival->id,
        ]);

        // Assert the busreis exists in the database
        $this->assertDatabaseHas('busreizen', [
            'departure' => $busreis->departure,
        ]);
    }
}
