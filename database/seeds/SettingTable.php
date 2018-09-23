<?php

use Illuminate\Database\Seeder;

class SettingTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        'site_name'      => "Laravel Blog",
        'contact_number' => '8319017988',
        'contact_mail'   => 'site@laravel.com',
        'address'        => 'Bangalore',
        'facebook'       => 'https://www.facebook.com/',
        'youtube'        => 'https://www.youtube.com/',
        'twiter'         => 'https://twitter.com/'
        ]);
    }
}
