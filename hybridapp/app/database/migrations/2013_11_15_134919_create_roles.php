<?php

use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration {


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('roles', function($table) {
            // auto incremental id (PK)
            $table->increments('role_id');
            // varchar 32
            $table->string('role_title', 45);
            $table->text('role_description')->nullable();
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
        Schema::drop('roles');
	}

}