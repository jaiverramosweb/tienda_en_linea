<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'email' => $this->faker->email,
            'ruc' => $this->faker->unixTime($max = 'now'),
            'addres' => $this->faker->address,
            'photo' => $this->faker->tollFreePhoneNumber,
        ];
    }
}
