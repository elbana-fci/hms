<?php

namespace Database\Factories;

use App\Models\Penalty;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenaltyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penalty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'penalty' => $this->faker->text(),
            'penalty_reason' => $this->faker->text(),
            'penalty' => $this->faker->text(),
            'execution' => $this->faker->boolean(),
            'execution_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'issuer' => $this->faker->userName(),
            'issue_number' => rand(5, 10),
            'user_id' => \App\Models\User::pluck('id')->random(),
            'judgement_id' => rand(0, 5),
        ];
    }
}
