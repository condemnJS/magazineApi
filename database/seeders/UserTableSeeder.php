<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'fio' => 'Гизатулин Султан Камильевич',
                'email' => 'gizat.sultan@mail.ru',
                'password' => Hash::make('123123'),
                'tel' => '88005553535',
                'role_id' => 1
            ]
        ];
        DB::table('users')->insert($users);
    }
}
