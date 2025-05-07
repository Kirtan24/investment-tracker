<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = Stock::class;

    public function definition(): array
    {
        return [
            'ticker_symbol' => strtoupper($this->faker->lexify('????')),
            'exchange' => $this->faker->randomElement(['NSE', 'BSE', 'NYSE', 'NASDAQ']),
            'purchase_date' => $this->faker->date(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'purchase_price_per_unit' => $this->faker->randomFloat(2, 100, 1000),
            'broker_name' => $this->faker->company(),
            'sector' => $this->faker->word(),
        ];
    }
}
