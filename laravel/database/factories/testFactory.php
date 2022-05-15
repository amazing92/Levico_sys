<?php

namespace Database\Factories;

use App\Models\test;
use Illuminate\Database\Eloquent\Factories\Factory;

class testFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'test' => $this->faker->randomDigitNotNull
        ];
    }
}
