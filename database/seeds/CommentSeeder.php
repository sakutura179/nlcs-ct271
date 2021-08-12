<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['news_id' => 1, 'username' => 'mai', 'content' => 'Bài viết hay quá!'],
            ['news_id' => 2, 'username' => 'khanhs12', 'content' => 'Nhìn thèm ghê :P'],
            ['news_id' => 3, 'username' => 'ngocj12', 'content' => 'Mong tới TI10 ghê'],
            ['news_id' => 1, 'username' => 'ngana', 'content' => 'Tướng mới nhìn ngon nhể'],
        ]);
    }
}
