<?php

use Illuminate\Database\Seeder;

class Cate_PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cate_plat')->insert([
            ['platform_id' => 1, 'category_id' => 1],
            ['platform_id' => 1, 'category_id' => 2],
            ['platform_id' => 1, 'category_id' => 3],
            ['platform_id' => 1, 'category_id' => 4],
            ['platform_id' => 1, 'category_id' => 9],

            ['platform_id' => 2, 'category_id' => 7],
            ['platform_id' => 2, 'category_id' => 8],
            ['platform_id' => 2, 'category_id' => 9],
            ['platform_id' => 2, 'category_id' => 10],
            ['platform_id' => 2, 'category_id' => 11],

            ['platform_id' => 3, 'category_id' => 7],
            ['platform_id' => 3, 'category_id' => 9],
            ['platform_id' => 3, 'category_id' => 10],

            ['platform_id' => 4, 'category_id' => 5],
            ['platform_id' => 4, 'category_id' => 6],

            ['platform_id' => '5', 'category_id' => 10],
        ]);
    }
}
