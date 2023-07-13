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
                'gender'=>"Female",
                'email'=>'sreyka@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
            [
                'store_id'=>1,
                'role_id'=>2,
                'first_name'=>"Chhilin",
                'last_name'=>"Yun",
                'gender'=>"Female",
                'email'=>'chhilin@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
            [
                'store_id'=>1,
                'role_id'=>3,
                'first_name'=>"Phannit",
                'last_name'=>"Phouy",
                'gender'=>"Female",
                'email'=>'phannit@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
            [
                'store_id'=>1,
                'role_id'=>4,
                'first_name'=>"Sreypich",
                'last_name'=>"Thun",
                'gender'=>"Female",
                'email'=>'sreypich@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
            [
                'store_id'=>1,
                'role_id'=>5,
                'first_name'=>"Chectra",
                'last_name'=>"Hong",
                'gender'=>"Male",
                'email'=>'chetra@gmail.com',
                'image'=>"https://avatars.githubusercontent.com/u/123075709?v=4",
                'password'=>'12345678',
            ],
            [
                'store_id'=>2,
                'role_id'=>4,
                'first_name'=>"Kaka",
                'last_name'=>"Ko",
                'gender'=>"Male",
                'email'=>'kaka@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
            [
                'store_id'=>3,
                'role_id'=>4,
                'first_name'=>"Lala",
                'last_name'=>"Ly",
                'gender'=>"Female",
                'email'=>'lala@gmail.com',
                'image'=>"https://i.pinimg.com/originals/76/1e/25/761e2551d2c973aae0ddf9043ff5d8ca.jpg",
                'password'=>'12345678',
            ],
        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
