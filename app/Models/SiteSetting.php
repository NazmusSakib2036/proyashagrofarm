<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SiteSetting extends Model
{
    protected $fillable = [
        'hero_video_path',
        'hero_headline',
        'hero_subtext',
        'hero_cta_text',
        'hero_cta_url',
        'about_short_intro',
        'about_full_details',
        'mission',
        'vision',
        'why_choose_us_text',
        'contact_email',
        'contact_phone',
        'contact_address',
        'admin_notification_email',
        'sender_gmail',
        'sender_gmail_app_key',
        'receiver_gmail',
        'map_url',
        'footer_text',
        'facebook_url',
        'instagram_url',
        'youtube_url',
    ];

    public function getMapEmbedUrlAttribute(): ?string
    {
        if (! $this->map_url) {
            return null;
        }

        $url = trim($this->map_url);

        if (str_contains($url, 'maps.app.goo.gl') || str_contains($url, 'goo.gl/maps')) {
            $url = $this->expandGoogleMapsShortUrl($url) ?? $url;
        }

        if (str_contains($url, 'google.com/maps/embed')) {
            return $url;
        }

        if (preg_match('/q=([^&]+)/', $url, $matches) === 1) {
            return 'https://www.google.com/maps?q=' . $matches[1] . '&output=embed';
        }

        if (preg_match('/query=([^&]+)/', $url, $matches) === 1) {
            return 'https://www.google.com/maps?q=' . $matches[1] . '&output=embed';
        }

        if (preg_match('/\/maps\/place\/([^\/?]+)/', $url, $matches) === 1) {
            $place = str_replace('+', ' ', urldecode($matches[1]));

            return 'https://www.google.com/maps?q=' . rawurlencode($place) . '&output=embed';
        }

        if (preg_match('/!3d(-?\d+(?:\.\d+)?)!4d(-?\d+(?:\.\d+)?)/', $url, $matches) === 1) {
            return 'https://www.google.com/maps?q=' . $matches[1] . ',' . $matches[2] . '&output=embed';
        }

        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches) === 1) {
            return 'https://www.google.com/maps?q=' . $matches[1] . ',' . $matches[2] . '&output=embed';
        }

        return null;
    }

    private function expandGoogleMapsShortUrl(string $url): ?string
    {
        return Cache::remember('maps-short-url:' . md5($url), now()->addDays(7), function () use ($url) {
            try {
                $response = Http::timeout(8)->get($url);
                $effectiveUri = $response->effectiveUri();

                return $effectiveUri ? (string) $effectiveUri : null;
            } catch (\Throwable) {
                return null;
            }
        });
    }
}
