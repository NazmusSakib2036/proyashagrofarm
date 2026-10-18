@extends('layouts.admin')

@section('title', 'Hero Section')

@section('content')
<h1>Hero Section</h1>
<form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')

    <label>Hero Video (mp4/webm/ogg, max 50MB)</label>
    <input type="file" name="hero_video" accept="video/mp4,video/webm,video/ogg">
    @if ($setting->hero_video_path)
        <video controls width="320">
            <source src="{{ asset('storage/' . $setting->hero_video_path) }}" type="video/mp4">
        </video>
    @endif

    <label>Headline</label>
    <input type="text" name="hero_headline" value="{{ old('hero_headline', $setting->hero_headline) }}" required>

    <label>Subtext</label>
    <input type="text" name="hero_subtext" value="{{ old('hero_subtext', $setting->hero_subtext) }}" required>

    <label>CTA Text</label>
    <input type="text" name="hero_cta_text" value="{{ old('hero_cta_text', $setting->hero_cta_text) }}" required>

    <label>CTA URL</label>
    <input type="text" name="hero_cta_url" value="{{ old('hero_cta_url', $setting->hero_cta_url) }}">

    <button type="submit">Save Hero Section</button>
</form>
@endsection
