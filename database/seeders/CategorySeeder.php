<?php

namespace Database\Seeders;

use App\Common\Constant;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'admin',
            'staff',
            'guest',
        ];

        if (!Category::exists()) {
            foreach ($users as $username) {
                $user = User::factory()->create(['username' => $username]);
                $numberOfProduct = 0;

                switch ($username) {
                    case 'admin':
                        $role = Role::findByName(Constant::ROLE_ADMIN);
                        $user->assignRole($role);
                        $numberOfProduct = 2;

                        break;
                    case 'staff':
                        $role = Role::findByName(Constant::ROLE_STAFF);
                        $user->assignRole($role);
                        $numberOfProduct = 1;

                        break;
                    default:
                        $numberOfProduct = 0;
                }

                Category::factory()->count($numberOfProduct)->create()->each(function ($category) use ($user) {
                    for ($i = 0; $i < 5; $i++) {
                        $product = Product::factory()->make();
                        $product->user_id = $user->id;
                        $category->products()->save($product);
                    }
                });
            }
        }
    }
}
