<?php

class TicketTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticketOne = Ticket::create(array(
            'ticket_body' => 'test key',
            'user_id' => 1,
        ));

        $ticketTwo = Ticket::create(array(
            'ticket_body' => 'test key',
            'user_id' => 2,
        ));

    }

}