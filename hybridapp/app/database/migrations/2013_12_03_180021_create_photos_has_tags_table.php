<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotosHasTagsTable extends Migration {

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
            $table->foreign('photo_id')->references('photo_id')->on('photos')->onDelete('cascade');;
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');;
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