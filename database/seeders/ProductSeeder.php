<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'ipone',
            'price' => '1000',
            'category_id' => 1,
            'provider_id' => 1,
        ]);

        Product::create([
            'name' => 'sansung',
            'price' => '2000',
            'category_id' => 1,
            'provider_id' => 1,
        ]);
    }
}
