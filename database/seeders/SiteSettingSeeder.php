<?php

namespace Database\Seeders;

use App\Models\SiteSetting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'title' => 'KDSU',
            'slogan' => 'समृद्ध साकोस सक्षम संघ',
            'location' => 'Banepa-7',
            'email' => 'banepa@gmail.com',
            'logo' => 'sample_logo.png',
            'phone' => '097711661127',
            'facebook_link' => 'https://www.facebook.com/banepa',
            'twitter_link' => 'https://www.facebook.com/banepa',
            'opening_time' => '9:30 AM -5:30PM',

        ]);
    }
}
