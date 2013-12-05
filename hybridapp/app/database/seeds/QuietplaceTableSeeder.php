<?php

class QuietplaceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Quietplace::create(array(
            'quietplace_description' => 'Nen kelder',
            'location_id' => 1
        ));
	}

}