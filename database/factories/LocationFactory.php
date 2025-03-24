<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Location::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(), // Random word for name
            'remarks' => $this->faker->sentence(), // Random sentence
            'status' => $this->faker->boolean(), // Random true or false (1 or 0)
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
