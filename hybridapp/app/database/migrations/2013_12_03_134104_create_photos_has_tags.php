<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotosHasTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('photos_has_tags', function($table)
        {
            $table->integer('photo_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('photo_id')->references('photo_id')->on('photos');
            $table->foreign('tag_id')->references('tag_id')->on('tags');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}