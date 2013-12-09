<?php

use Illuminate\Database\Migrations\Migration;

class CreateLineupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineups', function($table) {
            // auto incremental id (PK)
            $table->increments('lineup_id');
            $table->datetime('lineup_start');
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('stage_id')->unsigned();
            $table->integer('artist_id')->unsigned();
            //foreign key
            $table->foreign('stage_id')->references('stage_id')->on('stages');
            //foreign key
            $table->foreign('artist_id')->references('artist_id')->on('artists');
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