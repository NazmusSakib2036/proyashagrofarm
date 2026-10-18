<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HeroController extends Controller
{
    public function edit(): View
    {
        return view('admin.hero.edit', [
            'setting' => SiteSetting::query()->firstOrCreate([]),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $setting = SiteSetting::query()->firstOrCreate([]);

        $validated = $request->validate([
            'hero_video' => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/ogg', 'max:51200'],
            'hero_headline' => ['required', 'string', 'max:255'],
            'hero_subtext' => ['required', 'string', 'max:255'],
            'hero_cta_text' => ['required', 'string', 'max:100'],
            'hero_cta_url' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('hero_video')) {
            if ($setting->hero_video_path) {
                Storage::disk('public')->delete($setting->hero_video_path);
            }

            $validated['hero_video_path'] = $request->file('hero_video')->store('hero-videos', 'public');
        }

        $setting->update($validated);

        return back()->with('success', 'Hero section updated successfully.');
    }
}
