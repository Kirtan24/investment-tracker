<?php

namespace Database\Factories;

use App\Models\Investment;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestmentFactory extends Factory
{
    protected $model = Investment::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['fd', 'property', 'stock']),
            'user_id' => $this->faker->numberBetween(1, 11),
            'title' => $this->faker->sentence(3),
            'investment_date' => $this->faker->date(),
            'amount_invested' => 0,
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
