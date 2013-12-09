<?php

class CommentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Comment::create(array(
            'comment_body' => 'Coole foto',
            'user_id' => 1,
            'photo_id' => 1,
        ));

        Comment::create(array(
            'comment_body' => 'Valt nog mee',
            'user_id' => 2,
            'photo_id' => 1,
            'comment_parrent'=> 1
        ));
	}

}