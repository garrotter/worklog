<?php

namespace Database\Factories;

use App\Models\Subcontractor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcontractorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcontractor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber
        ];
    }
}
