<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('bjva1990');
        $privatekey = Hash::make('bjva1990');
        $publickey = Hash::make('bjva1990');

        User::create(array(
            'user_mail' => 'bjornvanacker8@hotmail.com',
            'user_password' => $password,
            'user_privatekey' => $privatekey,
            'user_publickey' => $publickey,
        ));
    }

}