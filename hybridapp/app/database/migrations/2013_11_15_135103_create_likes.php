<?php

use Illuminate\Database\Migrations\Migration;

class CreateLikes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function($table) {
            $table->integer('user_id')->unsigned();
            //foreign key
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->integer('artist_id')->unsigned();
            //foreign key
            $table->foreign('artist_id')->references('artist_id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('likes');
    }

}