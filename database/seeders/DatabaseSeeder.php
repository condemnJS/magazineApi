<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\SubsubCategorySeeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            // UserTableSeeder::class,
            // CategorySeeder::class,
            // SubCategorySeeder::class,
            // SubsubCategorySeeder::class,
            // OrderSeeder::class,
            // ReviewSeeder::class
        ]);
    }
}
