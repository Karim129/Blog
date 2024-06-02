<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $existingSettings = Settings::first();

        if (!$existingSettings) {
            Settings::create([
                'settings' => json_encode([
                    'phone' => '123-456-7890',
                    'email' => 'example@example.com',
                    'whatsapp' => '123-456-7890',
                    // 'address' => 'address',
                    // 'facebook' => 'https://www.facebook.com',
                    // 'header_logo' => asset('/storage/settings/MainAfter.webp'),
                    // 'footer_logo' => asset('/storage/settings/MainAfter.webp'),
                    // 'about' => 'about',
                    // 'mission' => 'mission',
                    // 'vision' => 'vision',
                ]),
            ]);
        }
    }
}
