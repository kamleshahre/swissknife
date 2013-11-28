<?php

use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->text('body');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('photo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('comment_parrent')->unsigned();
            //foreign key
            $table->foreign('photo_id')->references('id')->on('photos');
            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
            //foreign key
            $table->foreign('comment_parrent')->references('id')->on('comments');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('notifications');
	}

}