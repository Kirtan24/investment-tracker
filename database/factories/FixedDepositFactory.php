<?php

namespace Database\Factories;

use App\Models\FixedDeposit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FixedDepositFactory extends Factory
{
    protected $model = FixedDeposit::class;

    public function definition(): array
    {
        return [
            'bank_name' => $this->faker->company(),
            'fd_number' => strtoupper(Str::random(10)),
            'interest_rate' => $this->faker->randomFloat(2, 4, 9),
            'start_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'maturity_date' => $this->faker->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
            'interest_type' => $this->faker->randomElement(['simple', 'compound']),
            'compounding_frequency' => $this->faker->randomElement(['monthly', 'quarterly', 'half-yearly', 'yearly']),
            'is_tax_saver' => $this->faker->boolean(),
        ];
    }
}
