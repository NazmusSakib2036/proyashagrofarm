<label>Card Title</label>
<input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required>

<label>Card Details</label>
<textarea name="description" rows="4" class="js-richtext">{{ old('description', $service->description ?? '') }}</textarea>

<label>Subtitle (optional)</label>
<input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}">

<label>Image</label>
<input type="file" name="image" accept="image/*">
@if (!empty($service?->image_path))
    <img src="{{ asset('storage/' . $service->image_path) }}" alt="Service image" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}">

<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true))> Active</label>
