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
                'title' => 'Смартфоны',
                'subcategory_id' => 1,
                'slug' => 'smartfony'
            ],
            [
                'title' => 'Кнопочные телефоны',
                'subcategory_id' => 1,
                'slug' => 'knopochnye-telefony'
            ],
            [
                'title' => 'Аксессуары',
                'subcategory_id' => 1,
                'slug' => 'aksessuary'
            ],
            [
                'title' => 'Рации и прочие телефоны',
                'subcategory_id' => 1,
                'slug' => 'racii-i-prochie-telefony'
            ],
            [
                'title' => 'Тарифные планы и номера',
                'subcategory_id' => 1,
                'slug' => 'tarifnye-plany-i-nomera'
            ],
            [
                'title' => 'Мобильные телефоны',
                'subcategory_id' => 2,
                'slug' => 'mobilnye-telefony'
            ],
            [
                'title' => 'Игровые приставки',
                'subcategory_id' => 3,
                'slug' => 'igrovye-pristavki'
            ],
            [
                'title' => 'Бытовая техника',
                'subcategory_id' => 4,
                'slug' => 'umnaya-bytovaya-tehnika'
            ],
            [
                'title' => 'Планшеты',
                'subcategory_id' => 5,
                'slug' => 'planshety'
            ]
        ];
        DB::table('subsubcategories')->insert($subsubcategories);
    }
}
