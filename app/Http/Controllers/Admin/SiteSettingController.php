<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.site-settings.edit', [
            'setting' => SiteSetting::query()->firstOrCreate([]),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'about_short_intro' => ['nullable', 'string'],
            'about_full_details' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'why_choose_us_text' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone' => ['nullable', 'string', 'max:50'],
            'contact_address' => ['nullable', 'string', 'max:255'],
            'admin_notification_email' => ['nullable', 'email'],
            'sender_gmail' => ['nullable', 'email'],
            'sender_gmail_app_key' => ['nullable', 'string', 'max:255'],
            'receiver_gmail' => ['nullable', 'email'],
            'map_url' => ['nullable', 'url'],
            'footer_text' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'url'],
            'instagram_url' => ['nullable', 'url'],
            'youtube_url' => ['nullable', 'url'],
        ]);

        SiteSetting::query()->firstOrCreate([])->update($validated);

        return back()->with('success', 'Site settings updated successfully.');
    }
}
