<?php

namespace Database\Seeders;

use App\Models\ProductCustomize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCustomizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCustomizes = [
            ['product_id'=>1,'size'=>'small','quantity'=>1,'price'=>'3.5'],
            ['product_id'=>1,'size'=>'meduim','quantity'=>1,'price'=>'7'],
            ['product_id'=>1,'size'=>'large','quantity'=>1,'price'=>'10'],
            ['product_id'=>2,'size'=>'small','quantity'=>1,'price'=>'3.5'],
            ['product_id'=>2,'size'=>'meduim','quantity'=>1,'price'=>'7'],
            ['product_id'=>2,'size'=>'large','quantity'=>1,'price'=>'10'],
        ];
        foreach ($productCustomizes as $productCustomize){
            ProductCustomize::create($productCustomize);
        }
    }
}
