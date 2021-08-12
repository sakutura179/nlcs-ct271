<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['username' => 'khanhs', 'password' => bcrypt('121218'), 'role_id' => 2,
             'fullname' => 'Nguyễn Vương Quốc Khánh', 'email' => 'khanh@gmail.com',
             'birth_day' => Carbon::parse('2000-07-01'), 'address' => '17/8 Kênh 30/4', 
             'phone_no' => '0987654321', 'posts' => 1, 'level' => 10, 'salary' => 25000000, 
             'b_account_no' => '74210000123456'],

            ['username' => 'ngocj', 'password' => bcrypt('12121869'), 'role_id' => 2,
             'fullname' => 'Nguyễn Như Ngọc', 'email' => 'ngoc@gmail.com', 
             'birth_day' => Carbon::parse('2000-09-12'), 'address' => '512 Bùi Hữu Nghĩa', 
             'phone_no' => '0123456789', 'posts' => 1, 'level' => 9, 'salary' => 22000000,
             'b_account_no' => '74210000121218'],

            ['username' => 'hungw', 'password' => bcrypt('12345'), 'role_id' => 2,
             'fullname' => 'Huỳnh Quang Hưng', 'email' => 'hung@gmail.com', 
             'birth_day' => Carbon::parse('2000-05-16'), 'address' => '169 Kênh Xáng', 
             'phone_no' => '0987654654', 'posts' => 1, 'level' => 5, 'salary' => 15000000,
             'b_account_no' => '74210000123123'],

            ['username' => 'hana', 'password' => bcrypt('54321'), 'role_id' => 2,
             'fullname' => 'Lê Gia Hân', 'email' => 'han@gmail.com', 
             'birth_day' => Carbon::parse('2004-12-12'), 'address' => 'Lê Hồng Phong', 
             'phone_no' => '0123456777', 'posts' => 1, 'level' => 2, 'salary' => 12000000,
             'b_account_no' => '74210000456456'],
        ]);
    }
}
