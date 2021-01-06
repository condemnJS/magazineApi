<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'slug' => 'pokupki',
                'title' => 'Покупки',
                'icon' => 'purchases.svg'
            ],
            [
                'slug' => 'elektronika',
                'title' => 'Электроника',
                'icon' => 'electro.svg'
            ],
            [
                'slug' => 'kompyuternaya-tehnika',
                'title' => 'Компьютерная техника',
                'icon' => 'computer.svg'
            ],
            [
                'slug' => 'bytovaya-tehnika',
                'title' => 'Бытовая техника',
                'icon' => 'household.svg'
            ],
            [
                'slug' => 'detyam',
                'title' => 'Детям',
                'icon' => 'children.svg'
            ],
            [
                'slug' => 'tovary-dlya-doma',
                'title' => 'Товары для дома',
                'icon' => 'ordersForHome.svg'
            ],
            [
                'slug' => 'produkty',
                'title' => 'Продукты',
                'icon' => 'products.svg'
            ],
            [
                'slug' => 'krasota',
                'title' => 'Красота',
                'icon' => 'beauty.webp'
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
