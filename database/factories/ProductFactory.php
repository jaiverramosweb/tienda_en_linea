<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->ean8,
            'name' => $this->faker->unique()->word,
            'slug' => $this->faker->unique()->slug,
            'shopt_description' => $this->faker->sentence(6, true),
            'long_description' => $this->faker->sentence(6, true),
            'stock' => $this->faker->buildingNumber,
            'price' => $this->faker->randomNumber,
            'status' => 'ACTIVE',
            'subcategory_id' => rand(1, 10),
            'provider_id' => rand(1, 10)
        ];
    }
}
