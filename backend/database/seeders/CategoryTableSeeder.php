<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['store_id'=>"1",'name'=> "Food"],
            ['store_id'=>"1",'name'=> "Drink"],
          
        ];
        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
