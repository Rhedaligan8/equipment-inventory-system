<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'equipment_type_id' => 5,
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'acquired_date' => $this->faker->date,
            'location_id' => 2,
            'serial_number' => $this->faker->unique()->bothify('SN-#####'),
            'mr_no' => $this->faker->optional()->bothify('MR-#####'),
            'person_accountable_id' => 1,
            'person_accountable_current_unit_id' => 44,
            'remarks' => $this->faker->optional()->sentence,
        ];
    }
}
