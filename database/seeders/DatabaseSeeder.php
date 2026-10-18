<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@proyashagro.com'],
            [
                'name' => 'Proyash Admin',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]
        );

        SiteSetting::query()->firstOrCreate([], [
            'hero_headline' => 'কৃষিই আমাদের প্রেরণা',
            'hero_subtext' => 'আধুনিক প্রযুক্তিতে টেকসই কৃষি',
            'hero_cta_text' => 'আমাদের সম্পর্কে জানুন',
            'hero_cta_url' => '#about',
            'about_short_intro' => 'Proyash Agro Farm is committed to modern, sustainable and technology-driven agriculture.',
            'about_full_details' => 'We blend innovation, field expertise and community partnerships to elevate agricultural outcomes and long-term food security.',
            'mission' => 'Empower farming ecosystems with sustainable innovation and practical field support.',
            'vision' => 'Become a leading agro organization for resilient, climate-smart and profitable agriculture.',
            'why_choose_us_text' => 'We combine agronomy knowledge, transparency and execution excellence to deliver consistent value.',
            'contact_email' => 'admin@proyashagro.com',
            'contact_phone' => '+8801XXXXXXXXX',
            'contact_address' => 'Dhaka, Bangladesh',
            'admin_notification_email' => 'admin@proyashagro.com',
            'map_url' => 'https://www.google.com/maps?q=23.8103,90.4125',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'youtube_url' => 'https://youtube.com',
        ]);
    }
}
