<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Festival;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    protected $model = Festival::class;

    public function definition(): array
{
    return [
        'name' => fake()->unique()->words(3, true) . ' Festival',
        'location' => fake()->city() . ', ' . fake()->state(),
        'date' => fake()->dateTimeBetween('+1 week', '+1 year'),
        'description' => fake()->paragraph(3),
        'image' => fake()->imageUrl(640, 480, 'festival', true, 'Festival'),
        'price' => fake()->randomFloat(2, 0, 500), // Prices between 0 (free) and 500
        'tickets' => fake()->numberBetween(50, 1000), // Ticket count between 50 and 1000
        'status' => fake()->randomElement(['active', 'cancelled', 'completed', 'sold']),
    ];
}
 //\App\Models\Festival::factory()->count(10)->create();
}
