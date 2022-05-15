<?php

namespace Database\Factories;

use App\Models\lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class labFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = lab::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'lab' => $this->faker->word
        ];
    }
}
