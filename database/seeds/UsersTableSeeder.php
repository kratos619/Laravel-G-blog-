<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
            'name' => 'gaurav pal',
            'email' => 'gaurav.pal@gmail.com',
            'password' => bcrypt('123456'),
            'admin'=> 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'upload_images/avatar/img1.jpg',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum voluptates, modi fugit necessitatibus quam nihil perferendis tempore cumque sapiente amet impedit minus ex suscipit ab quidem commodi corrupti, perspiciatis mollitia!',
            'facebook' => 'www.facebook.com',
            'youtube' => 'www.youtube.com' 
        ]);
    }
}
