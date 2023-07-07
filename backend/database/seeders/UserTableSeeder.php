<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id'=>1,
                'first_name'=>"Sreyka",
                'last_name'=>"Thor",
                'email'=>'sreyka@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>1,
                'role_id'=>2,
                'first_name'=>"Chhilin",
                'last_name'=>"Yun",
                'email'=>'chhilin@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>1,
                'role_id'=>3,
                'first_name'=>"Phannit",
                'last_name'=>"Phouy",
                'email'=>'phannit@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>1,
                'role_id'=>4,
                'first_name'=>"Sreypich",
                'last_name'=>"Thun",
                'email'=>'sreypich@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>1,
                'role_id'=>5,
                'first_name'=>"Chectra",
                'last_name'=>"Hong",
                'email'=>'chetra@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>2,
                'role_id'=>4,
                'first_name'=>"Kaka",
                'last_name'=>"Ko",
                'email'=>'kaka@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
            [
                'store_id'=>3,
                'role_id'=>4,
                'first_name'=>"Lala",
                'last_name'=>"Ly",
                'email'=>'lala@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
                'is_active'=>true
            ],
        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
