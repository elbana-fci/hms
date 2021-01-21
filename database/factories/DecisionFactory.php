<?php

namespace Database\Factories;

use App\Models\Decision;
use Illuminate\Database\Eloquent\Factories\Factory;

class DecisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Decision::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'decision_number' => $this->faker->unique()->numberBetween(1, 20),
            'judgement_number' => $this->faker->unique()->numberBetween(1, 20),
            'decision_date' => now(),
            'issuing_authority' => $this->faker->randomElement(['Hospital', 'Department', 'Governer']),
            'user_id' => \App\Models\User::pluck('id')->random()
        ];
    }
}
