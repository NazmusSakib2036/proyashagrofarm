<label>Title</label>
<input type="text" name="title" value="{{ old('title', $ourTalk->title ?? '') }}" required>

<label>Description</label>
<textarea name="description" rows="8" class="js-richtext">{{ old('description', $ourTalk->description ?? '') }}</textarea>

<label>News / Video URL (optional)</label>
<input type="url" name="external_url" value="{{ old('external_url', $ourTalk->external_url ?? '') }}">

<label>Image</label>
<input type="file" name="image" accept="image/*">
@if (!empty($ourTalk?->image_path))
    <img src="{{ asset('storage/' . $ourTalk->image_path) }}" alt="Talk image" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $ourTalk->sort_order ?? 0) }}">

<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $ourTalk->is_active ?? true))> Active</label>
