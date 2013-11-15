<?php

use Illuminate\Database\Migrations\Migration;

class CreateLineups extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineups', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->datetime('start');
            //foreign key
            $table->foreign('stage_id')->references('id')->on('stages');
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
        Schema::drop('lineups');
    }

}