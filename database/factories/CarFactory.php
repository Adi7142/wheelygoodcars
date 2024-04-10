<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use App\Models\Car;


class CarFactory extends Factory
{
    protected $model = Tag::class;
    
public function definition()
{
    return [
        'user_id' => \App\Models\User::factory(),
        'license_plate' => $this->faker->vehicleLicensePlate,
        'make' => $this->faker->vehicleMake,
        'model' => $this->faker->vehicleModel,
        'price' => $this->faker->randomFloat(2, 5000, 50000),
        'mileage' => $this->faker->numberBetween(0, 200000),
        'seats' => $this->faker->optional()->numberBetween(2, 9),
        'doors' => $this->faker->optional()->numberBetween(2, 5),
        'production_year' => $this->faker->optional()->year,
        'weight' => $this->faker->optional()->numberBetween(800, 5000),
        'color' => $this->faker->optional()->colorName,
        'image' => $this->faker->optional()->imageUrl(),
        'sold_at' => $this->faker->optional()->dateTimeThisMonth,
        'views' => $this->faker->numberBetween(0, 500),
    ];
}
}
