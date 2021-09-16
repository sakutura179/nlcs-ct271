<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->unsignedInteger('category_id');
            $table->string('username', 50);
            $table->string('header', 100)->unique();
            $table->longText('content');
            $table->string('pic', 128);
            $table->boolean('trending');
            $table->unsignedInteger('view');
            $table->string('slug', 200)->unique();

            $table->foreign('category_id', 'fk_category_news')
                  ->references('category_id')->on('categories')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('username', 'fk_author_news')
                  ->references('username')->on('authors')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
