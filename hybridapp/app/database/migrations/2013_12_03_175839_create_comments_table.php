<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function($table) {
            // auto incremental id (PK)
            $table->increments('comment_id');
            $table->text('comment_body');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('photo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('comment_parrent')->unsigned()->nullable();
            //foreign key
            $table->foreign('photo_id')->references('photo_id')->on('photos')->onDelete('cascade');;
            //foreign key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;
            //foreign key
            $table->foreign('comment_parrent')->references('comment_id')->on('comments')->onDelete('set null');;
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