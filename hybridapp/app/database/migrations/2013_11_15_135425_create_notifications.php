<?php

use Illuminate\Database\Migrations\Migration;

class CreateNotifications extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->text('body');
            //foreign key
            $table->foreign('lineup_id')->references('id')->on('lineups');
            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('notifications');
    }

}