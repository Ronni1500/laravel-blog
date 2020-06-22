<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' =>  'Автор 1',
                'email' => 'test@mail.ru',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' =>  'Admin',
                'email' => 'test2@mail.ru',
                'password' => bcrypt('123456'),
            ],
        ];
        \Illuminate\Support\Facades\DB::table('users')->insert($data);
    }
}
