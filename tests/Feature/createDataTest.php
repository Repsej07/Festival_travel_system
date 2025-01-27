<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Busreizen;
use App\Models\Festival;
use App\Models\User;

class createDatatest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_createFestival(): void
    {
        $festival = Festival::factory()->create();

        // Assert the record was created in the database
        $this->assertDatabaseHas('festivals', [
            'id' => $festival->id, // Ensure the created record exists
        ]);
    }

    public function test_createBusreis(): void
    {
        $busreis = Busreizen::factory()->create();

        // Assert the record was created in the database
        $this->assertDatabaseHas('busreizen', [
            'id' => $busreis->id, // Ensure the created record exists
        ]);
    }


    public function test_createUser(): void
    {
        $user = User::factory()->create();

        // Assert the record was created in the database
        $this->assertDatabaseHas('users', [
            'id' => $user->id, // Ensure the created record exists
        ]);
    }
}
