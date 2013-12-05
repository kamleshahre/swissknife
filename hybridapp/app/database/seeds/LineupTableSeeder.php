<?php

class LineupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Lineup::create(array(
            'lineup_start' => date("Y-m-d H:i:s", time()),
            'stage_id' => 1,
            'artist_id' => 1,
        ));
	}

}