<?php

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Role::create(array(
            'role_title' => 'Super Admin',
            'role_description' => 'The Big Boss'
        ));

        Role::create(array(
            'role_title' => 'Admin',
            'role_description' => 'The Boss'
        ));

        Role::create(array(
            'role_title' => 'User'
        ));
	}

}