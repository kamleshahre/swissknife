<?php

class ParkingspotTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Parkingspot::create(array(
            'parkingspot_places' => 10,
            'parkingspot_available' => 6,
            'location_id' => 1
        ));
	}

}