<?php

use Illuminate\Database\Migrations\Migration;

class CreateParkingspots extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkingspots', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->integer('places');
            $table->integer('available');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('location_id')->unsigned();
            //foreign key
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parkingspots');
    }

}