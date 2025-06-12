<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\StatisticsDetail;
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
            'stat_title' => '2081 Baisakh',
        ]);

        StatisticsDetail::create([
            'name' => 'Total Assets',
            'value' => '360,000,645.24',
            'rank' => 1,
            'site_setting_id' => 1,

        ]);
    }
}
