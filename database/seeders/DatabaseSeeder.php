<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investment;
use App\Models\FixedDeposit;
use App\Models\Property;
use App\Models\Stock;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 Fixed Deposits
        for ($i = 0; $i < 10; $i++) {
            $investment = Investment::factory()->create(['type' => 'fd']);
            $fd = FixedDeposit::factory()->create(['investment_id' => $investment->id]);
            $investment->amount_invested = fake()->numberBetween(10000, 100000);
            $investment->save();
        }

        // Create 5 Properties
        for ($i = 0; $i < 10; $i++) {
            $investment = Investment::factory()->create(['type' => 'property']);
            $property = Property::factory()->create(['investment_id' => $investment->id]);
            $investment->amount_invested = $property->purchase_price;
            $investment->save();
        }

        // Create 5 Stocks
        for ($i = 0; $i < 10; $i++) {
            $investment = Investment::factory()->create(['type' => 'stock']);
            $stock = Stock::factory()->create(['investment_id' => $investment->id]);
            $investment->amount_invested = $stock->quantity * $stock->purchase_price_per_unit;
            $investment->save();
        }
    }
}
