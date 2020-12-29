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
                'subcategory_id' => 1
            ],
            [
                'title' => 'Планшеты и электронные книги',
                'subcategory_id' => 1
            ],
            [
                'title' => 'Наушники и Bluetooth-гарнитура',
                'subcategory_id' => 1
            ],
            [
                'title' => 'Смарт-часы и браслеты',
                'subcategory_id' => 1
            ],
            [
                'title' => 'Телевизоры и аксессуары',
                'subcategory_id' => 1
            ],
        ];
        DB::table('subsubcategories')->insert($subsubcategories);
    }
}
