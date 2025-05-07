<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'property_type' => $this->faker->randomElement(['residential', 'commercial', 'land', 'other']),
            'location' => $this->faker->address(),
            'purchase_date' => $this->faker->date(),
            'purchase_price' => $this->faker->numberBetween(500000, 10000000),
        ];
    }
}
