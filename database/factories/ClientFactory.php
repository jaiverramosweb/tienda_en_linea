<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'dni' => $this->faker->unique->unixTime($max = 'now'),
            'ruc' => $this->faker->unixTime($max = 'now'),
            'address' => $this->faker->address,
            'phone' => $this->faker->tollFreePhoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
