<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $json = File::get("database/users.json");
        $data = json_decode($json);
        foreach($data as $obj){
            User::create(array(
                'name' => $obj->name,
                'phone' => $obj->phone,
                'usertype' => $obj->usertype,
                'email' => $obj->email,
                'password' => Hash::make($obj->password)
            ));
        }
    }
}
