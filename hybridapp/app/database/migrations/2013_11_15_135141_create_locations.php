<?php

use Illuminate\Database\Migrations\Migration;

class CreateLocations extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->double('lat');
            $table->double('long');
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
        Schema::drop('locations');
    }

}