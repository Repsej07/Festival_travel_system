<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Busreizen>
 */
class BusreizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'departure' => fake()->city(),
            'arrival' => fake()->city(),
            'departure_date' => $departureDate = fake()->dateTimeBetween('-1 week', '+1 week'),
            'arrival_date' => $arrivalDate = fake()->dateTimeBetween($departureDate, $departureDate->format('Y-m-d H:i:s').' +2 days'),
            'departure_time' => $departureDate->format('H:i:s'),
            'arrival_time' => $arrivalDate->format('H:i:s'),
            'festival_id' => \App\Models\Festival::inRandomOrder()->first()->id,
        ];
    }
    //\App\Models\Busreizen::factory()->count(10)->create();
}
