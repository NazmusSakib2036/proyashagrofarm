<label>Name</label>
<input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" required>

<label>Designation</label>
<input type="text" name="designation" value="{{ old('designation', $member->designation ?? '') }}">

<label>Bio</label>
<textarea name="bio" rows="4" class="js-richtext">{{ old('bio', $member->bio ?? '') }}</textarea>

<label>Image</label>
<input type="file" name="image" accept="image/*">
@if (!empty($member?->image_path))
    <img src="{{ asset('storage/' . $member->image_path) }}" alt="Team member" class="admin-preview" loading="lazy">
@endif

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $member->sort_order ?? 0) }}">
