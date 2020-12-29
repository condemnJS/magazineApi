<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            [
                'title' => 'Электроника',
                'category_id' => 1
            ],
            [
                'title' => 'Детский товары',
                'category_id' => 1
            ],
            [
                'title' => 'Компьютерная техника',
                'category_id' => 1
            ],
            [
                'title' => 'Товары для дома',
                'category_id' => 1
            ],
            [
                'title' => 'Бытовая техника',
                'category_id' => 1
            ],
            [
                'title' => 'Продукты',
                'category_id' => 1
            ],
        ];
        DB::table('subcategories')->insert($subCategories);
    }
}
