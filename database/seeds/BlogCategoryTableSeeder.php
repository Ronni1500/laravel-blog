<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->generateData());
    }

    private function generateData():array {
        $categories = [];
        $categories[] = [
            'title' => 'Базовая категория',
            'desc' => '',
            'parent_id' => 0
        ];
        for ($i = 0; $i < 20; $i++){
            $categories[] = [
                'title' => 'Категория '. ($i+1),
                'desc' => '',
                'parent_id' => 1
            ];
        }
        return $categories;
    }
}
