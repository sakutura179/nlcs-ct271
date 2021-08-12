<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'Quản Trị Viên'],
            ['role_name' => 'Tác Giả'],
            ['role_name' => 'Người Dùng'],
        ]);
    }
}
