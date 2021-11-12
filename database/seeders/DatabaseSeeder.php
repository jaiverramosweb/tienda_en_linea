<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\SubCategory::factory(10)->create();
        \App\Models\Provider::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Client::factory(10)->create();

    }
}
