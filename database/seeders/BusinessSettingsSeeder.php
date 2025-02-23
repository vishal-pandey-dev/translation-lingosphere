<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Seeder;

class BusinessSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['type' => 'site_name', 'value' => 'Lingosphere'],
            ['type' => 'system_default_currency', 'value' => 'USD'],
            ['type' => 'system_default_language', 'value' => 'en']
        ];

        foreach ($settings as $setting) {
            BusinessSetting::create($setting);
        }
    }
}
