<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConcernController extends Controller
{
    public function index()
    {
        $concerns = Concern::orderBy('sort_order')->get();

        return view('admin.concerns.index', compact('concerns'));
    }

    public function create()
    {
        return view('admin.concerns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'images.*' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('concerns', 'public');
                $images[] = $path;
            }
        }

        $data['images'] = $images ?: null;

        Concern::create($data);

        return redirect()->route('admin.concerns.index')->with('success', 'Concern created.');
    }

    public function edit(Concern $concern)
    {
        return view('admin.concerns.edit', compact('concern'));
    }

    public function update(Request $request, Concern $concern)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'images.*' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        $images = $concern->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('concerns', 'public');
                $images[] = $path;
            }
        }

        $data['images'] = $images ?: null;

        $concern->update($data);

        return redirect()->route('admin.concerns.index')->with('success', 'Concern updated.');
    }

    public function destroy(Concern $concern)
    {
        $concern->delete();

        return redirect()->route('admin.concerns.index')->with('success', 'Concern deleted.');
    }
}
