<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'date' => $this->faker->dateTimeThisMonth($max = 'now + 14 days'),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'lead' => $this->faker->text($maxNbChars = 50)
        ];
    }
}
