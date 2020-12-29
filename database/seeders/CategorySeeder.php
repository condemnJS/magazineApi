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
                'title' => 'Покупки'
            ],
            [
                'title' => 'Электроника'
            ],
            [
                'title' => 'Компьютерная техника'
            ],
            [
                'title' => 'Бытовая техника'
            ],
            [
                'title' => 'Детям'
            ],
            [
                'title' => 'Товары для дома'
            ],
            [
                'title' => 'Продукты'
            ],
            [
                'title' => 'Красота'
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
