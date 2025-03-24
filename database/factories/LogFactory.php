<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Log;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition()
    {
        return [
            'user_id' => 1, // Fixed user ID
            'type' => $this->faker->randomElement(['update', 'delete', 'create', 'authentication', 'transfer']),
            'message' => $this->faker->sentence(),
            'created_at' => Carbon::now(),
        ];
    }
}
