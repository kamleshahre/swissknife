<?php

use Illuminate\Database\Migrations\Migration;

class CreateTentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tents', function($table) {
            // auto incremental id (PK)
            $table->increments('tent_id');
            $table->text('tent_description');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('location_id')->unsigned();
            $table->integer('user_id')->unsigned();
            //foreign key
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');;
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
        Schema::drop('tents');
    }

}