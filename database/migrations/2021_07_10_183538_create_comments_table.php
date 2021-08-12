<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->unsignedInteger('news_id');
            $table->string('username', 50);
            $table->text('content');

            $table->foreign('news_id', 'fk_news_comment')
                  ->references('news_id')->on('news')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('username', 'fk_viewer_comment')
                  ->references('username')->on('viewers')
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
        Schema::dropIfExists('comments');
    }
}
