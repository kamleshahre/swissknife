<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mail = 'bjornvanacker8@hotmail.com';
        $password = 'bjva1990';
        $privatekey = str_shuffle (Hash::make('bjva1990'.$mail));
        $publickey = str_shuffle (Hash::make('bjva1990'.$mail));

        $userOne = User::create(array(
            'user_mail' => $mail,
            'user_username' => "bjorvack",
            'user_password' => $password,
            'user_privatekey' => $privatekey,
            'user_publickey' => $publickey,
        ));

        $userOne->roles()->attach(1);
        $userOne->roles()->attach(3);

        $mail = 'nico.verb@gmail.com';
        $password = 'root';
        $privatekey = str_shuffle (Hash::make('root'.$mail));
        $publickey = str_shuffle (Hash::make('root'.$mail));

        $userTwo = User::create(array(
            'user_mail' => $mail,
            'user_username' => "nicoverbr",
            'user_password' => $password,
            'user_privatekey' => $privatekey,
            'user_publickey' => $publickey,
        ));

        $userTwo->roles()->attach(2);
        $userTwo->roles()->attach(3);

        $userTwo->friends()->attach(1);
        $userOne->friends()->attach(2);
    }

}