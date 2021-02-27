<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subsubcategories = [
            [
                'title' => 'Смартфоны и аксессуары',
                'subcategory_id' => 1,
                'slug' => 'smartfony-i-aksessuary'
            ],
            [
                'title' => 'Планшеты и электронные книги',
                'subcategory_id' => 1,
                'slug' => 'planshety-i-elektronnye-knigi'
            ],
            [
                'title' => 'Наушники и Bluetooth-гарнитура',
                'subcategory_id' => 1,
                'slug' => 'naushniki-i-bluetooth-garnitura'
            ],
            [
                'title' => 'Смарт-часы и браслеты',
                'subcategory_id' => 1,
                'slug' => 'smart-chasy-i-braslety'
            ],
            [
                'title' => 'Телевизоры и аксессуары',
                'subcategory_id' => 1,
                'slug' => 'televizory-i-aksessuary'
            ],
            [
                'title' => 'Конструкторы',
                'subcategory_id' => 2,
                'slug' => 'konstruktory'
            ]
        ];
        DB::table('subsubcategories')->insert($subsubcategories);
    }
}
