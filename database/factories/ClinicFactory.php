<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{

    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'description' => $this->faker->name(),
            'city' => 'Phnom Penh',
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'consult_price' => 10,
        ];
    }
}
