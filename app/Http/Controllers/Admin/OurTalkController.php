<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTalk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OurTalkController extends Controller
{
    public function index(): View
    {
        return view('admin.our-talks.index', [
            'ourTalks' => OurTalk::orderBy('sort_order')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.our-talks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('our-talks', 'public');
        }

        OurTalk::create($validated);

        return redirect()->route('admin.our-talks.index')->with('success', 'আমাদের কথা পোস্ট তৈরি হয়েছে।');
    }

    public function edit(OurTalk $ourTalk): View
    {
        return view('admin.our-talks.edit', compact('ourTalk'));
    }

    public function update(Request $request, OurTalk $ourTalk): RedirectResponse
    {
        $validated = $this->validatedData($request);

        if ($request->hasFile('image')) {
            if ($ourTalk->image_path) {
                Storage::disk('public')->delete($ourTalk->image_path);
            }

            $validated['image_path'] = $request->file('image')->store('our-talks', 'public');
        }

        $ourTalk->update($validated);

        return redirect()->route('admin.our-talks.index')->with('success', 'আমাদের কথা পোস্ট আপডেট হয়েছে।');
    }

    public function destroy(OurTalk $ourTalk): RedirectResponse
    {
        if ($ourTalk->image_path) {
            Storage::disk('public')->delete($ourTalk->image_path);
        }

        $ourTalk->delete();

        return redirect()->route('admin.our-talks.index')->with('success', 'আমাদের কথা পোস্ট ডিলিট হয়েছে।');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
