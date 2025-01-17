<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Festival;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Festival::factory(10)->create([
            // Other fields...
            'status' => 'active', // Change this to 'active', 'cancelled', or 'completed'
        ]);
    }
}
