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
                'title' => 'Покупки'
            ],
            [
                'slug' => 'elektronika',
                'title' => 'Электроника'
            ],
            [
                'slug' => 'kompyuternaya-tehnika',
                'title' => 'Компьютерная техника'
            ],
            [
                'slug' => 'bytovaya-tehnika',
                'title' => 'Бытовая техника'
            ],
            [
                'slug' => 'detyam',
                'title' => 'Детям'
            ],
            [
                'slug' => 'tovary-dlya-doma',
                'title' => 'Товары для дома'
            ],
            [
                'slug' => 'produkty',
                'title' => 'Продукты'
            ],
            [
                'slug' => 'krasota',
                'title' => 'Красота'
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
