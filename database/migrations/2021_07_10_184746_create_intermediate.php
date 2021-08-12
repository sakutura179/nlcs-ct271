<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntermediate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_plat', function (Blueprint $table) {
            $table->unsignedInteger('platform_id');
            $table->unsignedInteger('category_id');
            $table->primary(['platform_id', 'category_id']);
            
            $table->foreign('platform_id', 'fk_platform_intermediate')
                  ->references('platform_id')->on('platforms')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id', 'fk_category_intermediate')
                  ->references('category_id')->on('categories')
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
        Schema::dropIfExists('cate_plat');
    }
}
