<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function($table) {
            // auto incremental id (PK)
            $table->increments('photo_id');
            $table->string('photo_url',255);
            // created_at | updated_at DATETIME
            $table->timestamps();
            // deleted_at DATETIME
            $table->softDeletes();

            $table->integer('user_id')->unsigned();
            $table->integer('stage_id')->unsigned()->nullable();
            //foreign key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;
            //foreign key
            $table->foreign('stage_id')->references('stage_id')->on('stages')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }

}