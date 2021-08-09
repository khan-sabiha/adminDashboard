<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/customers.json");
        $data = json_decode($json);
        foreach($data as $obj){
            Customers::create(array(
                'name' => $obj->name,
                'phone' => $obj->phone,
                'email' => $obj->email,
                'password' => Hash::make($obj->password)
            ));
        }

        $jsonOrders = File::get("database/orders.json");
        $content = json_decode($jsonOrders);
        
            foreach($content as $object){
                Orders::create(array(
                    'customer_name' => $object->customer_name,
                    'customer_number' => $object->customer_number,
                    'pickup_location' => $object->pickup_location,
                    'dropoff_location' => $object->dropoff_location,
                    'order_descript' => $object->order_descript,
                    'order_amount' => $object->order_amount,
                    'customers_id' =>$object->customers_id
                ));
        }
       
    }
}
