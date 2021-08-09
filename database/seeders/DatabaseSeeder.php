<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\CustomerOrderSeeder;
use Database\Seeders\OrdersProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(CustomerOrderSeeder::class);
        $this->call(OrdersProductsSeeder::class);
        
    }
}
