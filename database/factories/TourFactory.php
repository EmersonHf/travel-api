<?php

namespace Database\Factories;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    protected $model = Tour::class;

    public function definition()
    {
        $startDate = now();
        $endingDate = $startDate->addDays(rand(1, 10));
        return [
            'travel_id' => Travel::factory(),
            'name' => $this->faker->word,
            'starting_date' => $startDate,
            'ending_date' => $endingDate,
            'price' => fake()->randomFloat(2, 10, 999)
        ];
    }

    // If you want to customize the 'price' attribute casting, you can override the attributes method
    public function configure()
    {
        return $this->afterMaking(function (Tour $tour) {
            $tour->price = $tour->price; // This will apply the casting defined in the model
        });
    }
}
