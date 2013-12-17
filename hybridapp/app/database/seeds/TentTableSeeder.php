<?php

class TentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Tent::create(array(
            'tent_description' => 'Men crappy tent',
            'location_id' => 1,
            'user_id' => 1
        ));
	}

}