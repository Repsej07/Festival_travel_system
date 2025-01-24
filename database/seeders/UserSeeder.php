<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Destany',
            'last_name' => 'Lemke',
            'username' => 'mueller.kailyn',
            'admin' => 1,
            'email' => 'test@example.com',
            'email_verified_at' => '2025-01-24 20:30:32',
            'password' => '$2y$12$FXo8zD1xfRo3S0jPgSsEWuKIbf3DH3z0K.1L.ANMKyZjyzMaoodzu',
            'remember_token' => '2yIcsCqdnZ',
            'points' => 474,
            'updated_at' => '2025-01-24 20:30:32',
            'created_at' => '2025-01-24 20:30:32',
        ]);
    }
}
