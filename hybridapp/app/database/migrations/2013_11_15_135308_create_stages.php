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
        Schema::create('stages', function($table) {
            // auto incremental id (PK)
            $table->increments('stage_id');
            $table->text('stage_body');
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
        Schema::drop('comments');
    }

}