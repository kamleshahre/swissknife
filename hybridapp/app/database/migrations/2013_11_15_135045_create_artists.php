<?php

use Illuminate\Database\Migrations\Migration;

class CreateArtists extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function($table) {
            // auto incremental id (PK)
            $table->increments('artist_id');
            $table->string('artist_name',255);
            $table->string('artist_url',255);
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
        Schema::drop('artists');
    }

}