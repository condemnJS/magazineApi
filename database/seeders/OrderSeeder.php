<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'title' => 'Смартфон Xiaomi Redmi 9 4/64GB',
                'price' => 3200,
                'images' => "['http://magazine.test/storage/app/public/xiaomi1.webp','http://magazine.test/storage/app/public/xiaomi2.webp','http://magazine.test/storage/app/public/xiaomi3.webp']",
                'subsubcategory_id' => 1
            ]
        ];
        collect($orders)->map(function ($item) {
            return Order::create($item);
        });
        
    }
}
