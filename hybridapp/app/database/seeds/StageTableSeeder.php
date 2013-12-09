<?php

class StageTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Stage::create(array(
            'stage_name' => 'Main stage',
            'stage_description' => 'The place to be',
            'location_id' => 1
        ));
	}

}