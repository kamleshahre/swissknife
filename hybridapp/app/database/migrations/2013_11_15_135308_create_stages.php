<?php

use Illuminate\Database\Migrations\Migration;

class CreateStages extends Migration {

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
            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
            //foreign key
            $table->foreign('photo_id')->references('id')->on('photos');
            //foreign key
            $table->foreign('comment_parent')->references('id')->on('comments');
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
        Schema::drop('comments');
    }

}