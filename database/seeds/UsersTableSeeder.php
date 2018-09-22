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
        $user = App\User::create([
             'name'      => 'Rajendra Singh Rathore',
             'email'     => 'rajendra.singh450@gmail.com',
             'password'  => bcrypt('geeta999'),
             'admin'     => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'upload/avatars/1.png',
            'about'   =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'facebook'=>'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
