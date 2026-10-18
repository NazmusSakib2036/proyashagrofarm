@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<h1>Site Settings</h1>
<form method="POST" action="{{ route('admin.site-settings.update') }}" class="admin-form">
    @csrf
    @method('PUT')

    <label>About Short Intro</label>
    <textarea name="about_short_intro" rows="3">{{ old('about_short_intro', $setting->about_short_intro) }}</textarea>

    <label>About Full Details</label>
    <textarea name="about_full_details" rows="5" class="js-richtext">{{ old('about_full_details', $setting->about_full_details) }}</textarea>
    <small class="muted">Use the editor toolbar to add lists, headings and formatting. Bulleted and numbered lists are supported.</small>

    <label>Mission</label>
    <textarea name="mission" rows="3" class="js-richtext">{{ old('mission', $setting->mission) }}</textarea>
    <small class="muted">Tip: use the bullet/number buttons to add lists. Save and check public page rendering.</small>

    <label>Vision</label>
    <textarea name="vision" rows="3" class="js-richtext">{{ old('vision', $setting->vision) }}</textarea>
    <small class="muted">Use simple lists and paragraphs for best results.</small>

    <label>Why Choose Us</label>
    <textarea name="why_choose_us_text" rows="3" class="js-richtext">{{ old('why_choose_us_text', $setting->why_choose_us_text) }}</textarea>

    <label>Contact Email</label>
    <input type="email" name="contact_email" value="{{ old('contact_email', $setting->contact_email) }}">

    <label>Contact Phone</label>
    <input type="text" name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone) }}">

    <label>Contact Address</label>
    <input type="text" name="contact_address" value="{{ old('contact_address', $setting->contact_address) }}">

    <label>Google Map URL</label>
    <input type="url" name="map_url" value="{{ old('map_url', $setting->map_url) }}">

    <label>Admin Notification Email</label>
    <input type="email" name="admin_notification_email" value="{{ old('admin_notification_email', $setting->admin_notification_email) }}">

    <label>Sender Gmail</label>
    <input type="email" name="sender_gmail" value="{{ old('sender_gmail', $setting->sender_gmail) }}">

    <label>Sender Gmail App Key</label>
    <input type="text" name="sender_gmail_app_key" value="{{ old('sender_gmail_app_key', $setting->sender_gmail_app_key) }}">

    <label>Receiver Gmail</label>
    <input type="email" name="receiver_gmail" value="{{ old('receiver_gmail', $setting->receiver_gmail) }}">

    <label>Footer Text</label>
    <input type="text" name="footer_text" value="{{ old('footer_text', $setting->footer_text) }}">

    <label>Facebook URL</label>
    <input type="url" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}">

    <label>Instagram URL</label>
    <input type="url" name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}">

    <label>YouTube URL</label>
    <input type="url" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}">

    <button type="submit">Save Settings</button>
</form>
@endsection
