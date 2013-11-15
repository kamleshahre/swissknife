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
            // auto incremental id (PK)
            $table->increments('id');
            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
            //foreign key
            $table->foreign('artist_id')->references('id')->on('artists');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();
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