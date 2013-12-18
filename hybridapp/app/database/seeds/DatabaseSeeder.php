<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('TicketTableSeeder');
        $this->call('ArtistTableSeeder');
        $this->call('LocationTableSeeder');
        $this->call('QuietplaceTableSeeder');
        $this->call('ParkingspotTableSeeder');
        $this->call('StageTableSeeder');
        $this->call('LineupTableSeeder');
        $this->call('NotificationTableSeeder');
        $this->call('TagTableSeeder');
        $this->call('PhotoTableSeeder');
        $this->call('CommentTableSeeder');
        $this->call('TentTableSeeder');
	}

}