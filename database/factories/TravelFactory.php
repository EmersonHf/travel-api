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
            'description' => $this->faker->sentence,
            'number_of_days' => $this->faker->numberBetween(1, 15), // Adjust the range based on your needs
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
