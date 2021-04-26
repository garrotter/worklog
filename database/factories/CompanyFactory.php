<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'tax' => $this->faker->numerify('########-#-##'),
            'bill_zip' => $this->faker->numerify('####'),
            'bill_country' => 'Magyarország',
            'bill_city' => $this->faker->city(),
            'bill_address' => $this->faker->streetAddress(),
            'post_zip' => $this->faker->numerify('####'),
            'post_country' => 'Magyarország',
            'post_address' => $this->faker->streetAddress()
        ];
    }
}
