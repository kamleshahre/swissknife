<?php

class LocationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Location::create(array(
            'location_lat' => 51.086784,
            'location_long' => 3.671661
        ));
	}

}