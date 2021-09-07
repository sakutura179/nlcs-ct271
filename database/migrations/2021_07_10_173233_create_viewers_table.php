<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewers', function (Blueprint $table) {
            $table->string('username', 20);
            $table->string('password', 100);
            $table->unsignedInteger('role_id');
            $table->string('fullname', 50);
            $table->string('email', 100)->unique();
            $table->date('birth_day');
            $table->rememberToken();
            $table->primary('username');

            $table->foreign('role_id', 'fk_roles_viewers')
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
        Schema::dropIfExists('viewers');
    }
}
