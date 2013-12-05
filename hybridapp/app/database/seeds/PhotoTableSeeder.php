<?php

class PhotoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $photoOne = Photo::create(array(
            'photo_url' => 'http://www.slice-works.com/slicev4blog/wp-content/uploads/2012/12/Rock-Concert.jpg',
            'user_id' => 1,
            'stage_id' => 1
        ));

        $photoTwo = Photo::create(array(
            'photo_url' => 'http://www.gva.be/ahimgpath/assets_img_gva/2012/06/26/2337937/met-rik-torfs-naar-graspop-mijn-pink-is-te-klein-id3333236-1000x800-n.jpg',
            'user_id' => 1
        ));

        $photoOne->tags()->attach([1,2,3]);
	}

}