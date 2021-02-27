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
                'slug' => 'elektronika',
                'title' => 'Электроника',
                'icon' => 'electro.svg',
                'image' => 'electronica.png',
            ],
            [
                'slug' => 'kompyuternaya-tehnika',
                'title' => 'Компьютерная техника',
                'icon' => 'computer.svg',
                'image' => 'computer.png'
            ],
            [
                'slug' => 'bytovaya-tehnika',
                'title' => 'Бытовая техника',
                'icon' => 'household.svg',
                'image' => 'technic.png'
            ],
            [
                'slug' => 'detyam',
                'title' => 'Детям',
                'icon' => 'children.svg',
                'image' => 'childrens.png'
            ],
            [
                'slug' => 'tovary-dlya-doma',
                'title' => 'Товары для дома',
                'icon' => 'ordersForHome.svg',
                'image' => 'home.png'
            ],
            [
                'slug' => 'produkty',
                'title' => 'Продукты',
                'icon' => 'products.svg',
                'image' => 'products.png'
            ],
            [
                'slug' => 'krasota',
                'title' => 'Красота',
                'icon' => 'beauty.webp',
                'image' => 'beuty.png'
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
