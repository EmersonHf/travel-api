<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Travel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'is_public' => fake()->boolean(),
            'description' => fake()->text(100),
            'number_of_days' => rand(1, 10)
        ];
    }

    // If you want to customize the 'numberOfNights' attribute casting, you can override the attributes method
    public function configure()
    {
        return $this->afterMaking(function (Travel $travel) {
            $travel->number_of_days = $travel->number_of_days; // This will apply the casting defined in the model
        });
    }
}
