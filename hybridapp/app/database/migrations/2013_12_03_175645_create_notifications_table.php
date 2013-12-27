<?php

use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function($table) {
            // auto incremental id (PK)
            $table->increments('notification_id');
            $table->text('notification_body');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('lineup_id')->unsigned();
            $table->integer('user_id')->unsigned();
            //foreign key
            $table->foreign('lineup_id')->references('lineup_id')->on('lineups')->onDelete('cascade');;
            //foreign key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;
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