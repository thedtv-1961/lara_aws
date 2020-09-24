<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isProductEmpty = Product::all()->isEmpty();

        if ($isProductEmpty) {
            Product::factory()->count(25)->create();
        }
    }
}
