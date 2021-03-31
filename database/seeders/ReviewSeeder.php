<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'dignity' => 'Какой-то хороший текст',
                'disadvantages' => 'Какой-то не хороший текст',
                'commentary' => 'Просто комментарий',
                'user_id' => 10,
                'order_id' => 1,
                'rating' => 5
            ],   
            [
                'dignity' => 'Какой-то хороший текст',
                'disadvantages' => 'Какой-то не хороший текст',
                'commentary' => 'Просто комментарий',
                'user_id' => 2,
                'order_id' => 1,
                'rating' => 3
            ],  
        ];
        DB::table('reviews')->insert($reviews);
    }
}
