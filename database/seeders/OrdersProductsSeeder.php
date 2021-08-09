<?php

namespace Database\Seeders;

use App\Models\OrdersProducts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OrdersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/orderProducts.json");
        $data = json_decode($json);
        foreach($data as $obj){
            OrdersProducts::create(array(
                'orders_id' => $obj->orders_id,
                'products_id' => $obj->products_id,
                'total' => $obj->total,
                'quantity' => $obj->quantity,

            ));

        }
    }
}
