<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            ['username' => 'khanh', 'password' => bcrypt('121218'), 'role_id' => 1],

            ['username' => 'ngoc', 'password' => bcrypt('12121869'), 'role_id' => 1],
        ]);
    }
}
