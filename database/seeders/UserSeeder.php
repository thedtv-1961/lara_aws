<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isUserEmpty = User::exists();

        if ($isUserEmpty) {
            User::factory()->count(3)->create();
        }
    }
}
