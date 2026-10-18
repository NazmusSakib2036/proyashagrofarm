<label>Name</label>
<input type="text" name="name" value="{{ old('name', $testimonial->name ?? '') }}" required>

<label>Designation</label>
<input type="text" name="designation" value="{{ old('designation', $testimonial->designation ?? '') }}">

<label>Testimonial</label>
<textarea name="content" rows="4" class="js-richtext" required>{{ old('content', $testimonial->content ?? '') }}</textarea>

<label>Rating (1-5)</label>
<input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}">

<label>Image</label>
<input type="file" name="image" accept="image/*">
@if (!empty($testimonial?->image_path))
    <img src="{{ asset('storage/' . $testimonial->image_path) }}" alt="Testimonial" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">

<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true))> Active</label>
