<?php

use Illuminate\Database\Migrations\Migration;

class CreateParkingspotsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkingspots', function($table) {
            // auto incremental id (PK)
            $table->increments('parkingspot_id');
            $table->integer('parkingspot_places');
            $table->integer('parkingspot_available');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('location_id')->unsigned();
            //foreign key
            $table->foreign('location_id')->references('location_id')->on('locations');
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