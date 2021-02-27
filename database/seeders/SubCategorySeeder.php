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
                'title' => 'Смартфоны и аксессуры',
                'category_id' => 1,
                'slug' => 'smartfony-i-aksessury'
            ],
            [
                'title' => 'Смарт-часы и браслеты',
                'category_id' => 1,
                'slug' => 'smart-chasy-i-braslety'
            ],
            [
                'title' => 'Гейминг',
                'category_id' => 1,
                'slug' => 'gejming'
            ],
            [
                'title' => 'Умный дом',
                'category_id' => 1,
                'slug' => 'umnyj-dom'
            ],
            [
                'title' => 'Планшеты и электронные книги',
                'category_id' => 1,
                'slug' => 'planshety-i-elektronnye-knigi'
            ],
            [
                'title' => 'Портативная и носимая электроника',
                'category_id' => 1,
                'slug' => 'portativnaya-i-nosimaya-elektronika'
            ],
            [
                'title' => 'Запасные части для мобильных телефонов',
                'category_id' => 1,
                'slug' => 'zapasnye-chasti-dlya-mobilьnyh-telefonov'
            ],
        ];
        DB::table('subcategories')->insert($subCategories);
    }
}
