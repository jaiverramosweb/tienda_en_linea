<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permissions_index',
            'permissions_create',
            'permissions_show',
            'permissions_edit',
            'permissions_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'category_index',
            'category_create',
            'category_show',
            'category_edit',
            'category_destroy',

            'product_index',
            'product_create',
            'product_show',
            'product_edit',
            'product_destroy',

            'client_index',
            'client_create',
            'client_show',
            'client_edit',
            'client_destroy',

            'provider_index',
            'provider_create',
            'provider_show',
            'provider_edit',
            'provider_destroy',

            'purchase_index',
            'purchase_create',
            'purchase_show',
            'purchase_edit',
            'purchase_destroy',

            'sale_index',
            'sale_create',
            'sale_show',
            'sale_edit',
            'sale_destroy',

            'reports_day',
            'reports_date',
            'reports_result',

            'subcategories_index',
            'subcategories_create',
            'subcategories_show',
            'subcategories_edit',
            'subcategories_destroy',

            'tag_index',
            'tag_create',
            'tag_show',
            'tag_edit',
            'tag_destroy',

            
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
