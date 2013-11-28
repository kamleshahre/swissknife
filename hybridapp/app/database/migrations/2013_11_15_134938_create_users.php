<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            // auto incremental id (PK)
            $table->increments('id');
            $table->string('mail',255);
            $table->string('password', 32);
            $table->string('salt', 22);
            $table->text('privatekey',255);
            $table->text('publickey',255);
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
        Schema::drop('users');
	}

}