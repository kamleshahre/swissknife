<?php

class TagTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Tag::create(array(
            'tag_name' => 'Metal',
        ));

        Tag::create(array(
            'tag_name' => 'Rock',
        ));

        Tag::create(array(
            'tag_name' => 'Classic'
        ));
	}

}