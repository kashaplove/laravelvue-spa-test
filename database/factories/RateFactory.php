<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->colorName,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'category_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
