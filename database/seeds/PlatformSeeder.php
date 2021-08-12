<?php

use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            ['platform_name' => 'PC'],
            ['platform_name' => 'PlayStation'],
            ['platform_name' => 'Xbox'],
            ['platform_name' => 'Mobile'],
            ['platform_name' => 'Nitendo Switch'],
        ]);
    }
}
