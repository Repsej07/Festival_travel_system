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

        $this->assertDatabaseHas('festivals', [
            'id' => $festival->id,
        ]);
    }

    public function test_createBusreis(): void
    {
        $busreis = Busreizen::factory()->create();

        $this->assertDatabaseHas('busreizen', [
            'id' => $busreis->id,
        ]);
    }


    public function test_createUser(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id, 
        ]);
    }
}
