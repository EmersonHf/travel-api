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
        $startDate = $this->faker->dateTimeThisMonth;
        $endingDate = $this->faker->dateTimeBetween($startDate);
        $travel = Travel::inRandomOrder()->first(); // Get a random travel record
        return [
            'travel_id' => $travel->id,
            'name' => $this->faker->word,
            'starting_date' => $startDate,
            'ending_date' => $endingDate,
            'price' => $this->faker->numberBetween(100, 1000), // You can adjust the range based on your needs
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
