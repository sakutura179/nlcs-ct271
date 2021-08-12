<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'LoL', 'category_fullname' => 'League of Legends'],
            ['category_name' => 'Valorant', 'category_fullname' => 'Valorant'],
            ['category_name' => 'CS:GO', 'category_fullname' => 'Counter Strike: Global Offensive'],
            ['category_name' => 'Dota2', 'category_fullname' => 'Dota2'],
            ['category_name' => 'Wild Rift', 'category_fullname' => 'League of Legends: Wild Rift'],
            ['category_name' => 'AoV', 'category_fullname' => 'Arena of Valor'],
            ['category_name' => 'Horizon Forbidden West', 'category_fullname' => 'Horizon Forbidden West'],
            ['category_name' => 'GoW 5: Ragnarok', 'category_fullname' => 'God of War 5: Ragnarok'],
            ['category_name' => 'TES VI: Hammerfell', 'category_fullname' => 'The Elder Scrolls VI: Hammerfell'],
            ['category_name' => 'Legend of Zelda: BoTW 2', 'category_fullname' => 'The Legend of Zelda: Breath of the Wild 2'],
            ['category_name' => 'Demon\'s Souls', 'category_fullname' => 'Demon\'s Souls'],
        ]);
    }
}
