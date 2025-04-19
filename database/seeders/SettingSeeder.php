<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\ShowcaseSetting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::find(1);

        if(is_null($setting))
        {
            Setting::create([
                'website_title'         => 'Admin Panel',
                'website_logo_dark'     => '',
                'website_logo_light'    => '',
                'website_logo_small'    => '',
                'website_favicon'       => '',
                'meta_title'            => '',
                'meta_description'      => '',
                'meta_tag'              => '',
                'currency_id'           => 1,
                'address'               => 'New Delhi, India',
                'phone'                 => '+91-8447290904',
                'email'                 => 'naved.nice@gmail.com',
                'facebook'              => 'https://www.facebook.com/salman.ahmad',
                'twitter'               => 'www.twitter.com/salman.ahmad',
                'linkedin'              => '',
                'instagram'             => '',
                'github'                => ''
            ]);
        }
    }
}
