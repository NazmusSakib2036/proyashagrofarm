<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaPartner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaPartnerController extends Controller
{
    public function index(): View
    {
        return view('admin.media-partners.index', [
            'mediaPartners' => MediaPartner::orderBy('sort_order')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.media-partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('media-partners', 'public');
        }

        MediaPartner::create($validated);

        return redirect()->route('admin.media-partners.index')->with('success', 'Media partner created successfully.');
    }

    public function edit(MediaPartner $mediaPartner): View
    {
        return view('admin.media-partners.edit', compact('mediaPartner'));
    }

    public function update(Request $request, MediaPartner $mediaPartner): RedirectResponse
    {
        $validated = $this->validatedData($request);

        if ($request->hasFile('logo')) {
            if ($mediaPartner->logo_path) {
                Storage::disk('public')->delete($mediaPartner->logo_path);
            }

            $validated['logo_path'] = $request->file('logo')->store('media-partners', 'public');
        }

        $mediaPartner->update($validated);

        return redirect()->route('admin.media-partners.index')->with('success', 'Media partner updated successfully.');
    }

    public function destroy(MediaPartner $mediaPartner): RedirectResponse
    {
        if ($mediaPartner->logo_path) {
            Storage::disk('public')->delete($mediaPartner->logo_path);
        }

        $mediaPartner->delete();

        return redirect()->route('admin.media-partners.index')->with('success', 'Media partner deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'url', 'max:255'],
            'logo' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
