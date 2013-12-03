<?php

use Illuminate\Database\Migrations\Migration;

class CreateTags extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function($table) {
            // auto incremental id (PK)
            $table->increments('tag_id');
            $table->string('tag_name',255);
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
        Schema::drop('tags');
    }

}