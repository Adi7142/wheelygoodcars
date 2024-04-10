<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use App\Models\Car;
class TagFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'color' => $this->faker->hexColor,
        ];
    }
}


