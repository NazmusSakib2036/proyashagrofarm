<label>Title</label>
<input type="text" name="title" value="{{ old('title', $mediaPartner->title ?? '') }}" required>

<label>Website / YouTube URL</label>
<input type="url" name="url" value="{{ old('url', $mediaPartner->url ?? '') }}">

<label>Logo</label>
<input type="file" name="logo" accept="image/*">
@if (!empty($mediaPartner?->logo_path))
    <img src="{{ asset('storage/' . $mediaPartner->logo_path) }}" alt="Media logo" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $mediaPartner->sort_order ?? 0) }}">

<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $mediaPartner->is_active ?? true))> Active</label>
