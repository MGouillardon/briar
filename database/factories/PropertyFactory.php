<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->text(130),
            'area' => $this->faker->numberBetween(20, 2000),
            'rooms' => $this->faker->numberBetween(1, 10),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'floor' => $this->faker->numberBetween(0, 5),
            'price' => $this->faker->numberBetween(1000, 1000000),
            'city' => $this->faker->city,
            'address' => $this->faker->buildingNumber() . ' ' . $this->faker->streetName(),
            'zip_code' => $this->faker->postcode,
            'sold' => $this->faker->boolean,
        ];
    }
}
