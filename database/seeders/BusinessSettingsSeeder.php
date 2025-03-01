<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BusinessSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['id' => 1, 'type' => 'home_default_currency', 'value' => '1', 'created_at' => '2018-10-16 01:35:52', 'updated_at' => '2019-01-28 01:26:53'],
            ['id' => 2, 'type' => 'system_default_currency', 'value' => '1', 'created_at' => '2018-10-16 01:36:58', 'updated_at' => '2023-06-29 04:59:51'],
            ['id' => 3, 'type' => 'currency_format', 'value' => '1', 'created_at' => '2018-10-17 03:01:59', 'updated_at' => '2018-10-17 03:01:59'],
            ['id' => 4, 'type' => 'symbol_format', 'value' => '1', 'created_at' => '2018-10-17 03:01:59', 'updated_at' => '2019-01-20 02:10:55'],
            ['id' => 5, 'type' => 'no_of_decimals', 'value' => '2', 'created_at' => '2018-10-17 03:01:59', 'updated_at' => '2020-03-04 00:57:16'],
            ['id' => 6, 'type' => 'product_activation', 'value' => '1', 'created_at' => '2018-10-28 01:38:37', 'updated_at' => '2019-02-04 01:11:41'],
            ['id' => 7, 'type' => 'vendor_system_activation', 'value' => '0', 'created_at' => '2018-10-28 07:44:16', 'updated_at' => '2020-06-23 16:07:03'],
            ['id' => 8, 'type' => 'show_vendors', 'value' => '1', 'created_at' => '2018-10-28 07:44:47', 'updated_at' => '2019-02-04 01:11:13'],
            ['id' => 9, 'type' => 'paypal_payment', 'value' => '0', 'created_at' => '2018-10-28 07:45:16', 'updated_at' => '2019-01-31 05:09:10'],
            ['id' => 10, 'type' => 'stripe_payment', 'value' => '0', 'created_at' => '2018-10-28 07:45:47', 'updated_at' => '2018-11-14 01:51:51'],
            ['id' => 11, 'type' => 'cash_payment', 'value' => '1', 'created_at' => '2018-10-28 07:46:05', 'updated_at' => '2019-01-24 03:40:18'],
            ['id' => 12, 'type' => 'payumoney_payment', 'value' => '0', 'created_at' => '2018-10-28 07:46:27', 'updated_at' => '2019-03-05 05:41:36'],
            ['id' => 13, 'type' => 'best_selling', 'value' => '1', 'created_at' => '2018-12-24 08:13:44', 'updated_at' => '2019-02-14 05:29:13'],
            ['id' => 14, 'type' => 'paypal_sandbox', 'value' => '0', 'created_at' => '2019-01-16 12:44:18', 'updated_at' => '2019-01-16 12:44:18'],
            ['id' => 15, 'type' => 'sslcommerz_sandbox', 'value' => '1', 'created_at' => '2019-01-16 12:44:18', 'updated_at' => '2019-03-14 00:07:26'],
            ['id' => 16, 'type' => 'sslcommerz_payment', 'value' => '0', 'created_at' => '2019-01-24 09:39:07', 'updated_at' => '2019-01-29 06:13:46'],
            ['id' => 17, 'type' => 'vendor_commission', 'value' => '20', 'created_at' => '2019-01-31 06:18:04', 'updated_at' => '2019-04-13 06:49:26'],
            ['id' => 18, 'type' => 'verification_form', 'value' => '[{"type":"text","label":"Your name"},{"type":"text","label":"Shop name"},{"type":"text","label":"Email"},{"type":"text","label":"License No"},{"type":"text","label":"Full Address"},{"type":"text","label":"Phone Number"},{"type":"file","label":"Tax Papers"}]', 'created_at' => '2019-02-03 11:36:58', 'updated_at' => '2019-02-16 06:14:42'],
        ];

        foreach ($settings as $setting) {
            BusinessSetting::create($setting);
        }
    }
}
