<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->string('username', 20);
            $table->string('password', 100);
            $table->unsignedInteger('role_id');
            $table->string('fullname', 50);
            $table->string('email', 100)->unique();
            $table->date('birth_day');
            $table->string('address', 100);
            $table->char('phone_no', 10);
            $table->unsignedInteger('posts');
            $table->unsignedSmallInteger('level');
            $table->unsignedInteger('salary');
            $table->char('b_account_no', 14);
            $table->rememberToken();
            $table->primary('username');

            $table->foreign('role_id', 'fk_roles_authors')
                  ->references('role_id')->on('roles')
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
        Schema::dropIfExists('authors');
    }
}
