<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Category::exists()) {
            User::factory()->count(2)->create()->each(function ($user) {
                Category::factory()->count(5)->create()->each(function ($category) use ($user) {
                    for ($i = 0; $i < 5; $i++) {
                        $product = Product::factory()->make();
                        $product->user_id = $user->id;
                        $category->products()->save($product);
                    }
                    //                Product::factory()->count(5)->create()->each(function ($product) use ($category) {
                    //                    $category->products()->save($product);
                    //                });
                });
            });
        }
    }
}
