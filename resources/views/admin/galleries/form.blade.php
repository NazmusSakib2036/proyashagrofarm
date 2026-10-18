<label>Title</label>
<input type="text" name="title" value="{{ old('title', $gallery->title ?? '') }}">

<label>Image</label>
<input type="file" name="image" accept="image/*" {{ isset($gallery) ? '' : 'required' }}>
@if (!empty($gallery?->image_path))
    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $gallery->sort_order ?? 0) }}">
