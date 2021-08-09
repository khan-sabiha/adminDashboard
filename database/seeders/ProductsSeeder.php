<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $json = File::get("database/products.json");
        $data = json_decode($json);
        foreach ($data as $obj ){
            Products::create(array(
            'p_name' => $obj->p_name,
            'img' => url("/images/{$faker->image('public/images',200,100, null, false)}"),
            'p_descript' => $obj->p_descript,
            'categories' => $obj->categories,
            'price' => $obj->price,
            'quantity' => $obj->quantity
            ));

        }
    }
}
