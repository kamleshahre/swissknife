<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersHasRolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_roles', function($table)
        {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_has_roles');
    }

}