<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasFriends extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_has_friends',function($table)
		{
            $table->integer('user_id')->unsigned();
            $table->integer('user_friend_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('user_friend_id')->references('user_id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_has_friends');
	}

}
