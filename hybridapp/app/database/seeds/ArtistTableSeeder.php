<?php

class ArtistTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $artist = Artist::create(array(
            'artist_name' => 'Mozart',
            'artist_url' => 'http://nl.wikipedia.org/wiki/Wolfgang_Amadeus_Mozart',
        ));

        $artist->likes()->attach(1);
    }

}