<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ViewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viewers')->insert([
            ['username' => 'quas', 'password' => bcrypt('261957'), 'role_id' => 3, 
             'fullname' => 'Nguyễn Minh Quá', 
             'email' => 'qua@gmail.com', 'birth_day' => Carbon::parse('1957-06-02')],

            ['username' => 'mai', 'password' => bcrypt('521963'), 'role_id' => 3, 
             'fullname' => 'Vương Thị Kim Mai', 
             'email' => 'mai@gmail.com', 'birth_day' => Carbon::parse('1963-02-05')],

            ['username' => 'ngana', 'password' => bcrypt('1061993'), 'role_id' => 3, 
             'fullname' => 'Nguyễn Vương Kim Ngân', 
             'email' => 'ngan@gmail.com', 'birth_day' => Carbon::parse('1993-06-10')],

            ['username' => 'khanhs12', 'password' => bcrypt('121218'), 'role_id' => 3, 
             'fullname' => 'Nguyễn Vương Quốc Khánh', 
             'email' => 'khanh@gmail.com', 'birth_day' => Carbon::parse('2000-07-01')],

            ['username' => 'ngocj12', 'password' => bcrypt('12121869'), 'role_id' => 3, 
             'fullname' => 'Nguyễn Như Ngọc', 
             'email' => 'ngoc12@gmail.com', 'birth_day' => Carbon::parse('2000-09-12')],
        ]);
    }
}
