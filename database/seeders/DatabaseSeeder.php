<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Festival;
use App\Models\Busreizen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'username' => 'admin',
            'admin' => true,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);
        Festival::factory(10)->create();
        Busreizen::factory(10)->create();

    }
}
