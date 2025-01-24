<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Festival;
use App\Models\Busreizen;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Festival::factory(10)->create();
        Busreizen::factory(10)->create();

    }
}
