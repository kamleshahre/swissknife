<?php

class NotificationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Notification::create(array(
            'notification_body' => 'Het consert gaat zo beginnen',
            'user_id' => 1,
            'lineup_id' => 1
        ));
	}

}