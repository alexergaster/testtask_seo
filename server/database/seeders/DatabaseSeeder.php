<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->create(
            [
                "name" => "Електроніка",
                "description" => "Найкращі електроні пристрої в галактиці 👾(У одного товара одна категорія :) )"
            ]);
        Category::factory()->create(
            [
                "name" => "Побутова хімія",
                "description" => "Найкраща хімія в вашому місті ⚗️(У одного товара одна категорія :) )"
            ],
        );

       Product::factory(10)->create();
    }
}
