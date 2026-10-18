@extends('layouts.admin')

@section('title','Add Award')

@section('content')
<h1>Add Award</h1>
<form method="POST" action="{{ route('admin.awards.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    
    <label>Award Name *</label>
    <input name="name" type="text" required value="{{ old('name') }}">
    @error('name')<span class="error">{{ $message }}</span>@enderror

    <label>Description</label>
    <textarea name="description" rows="8" class="js-richtext">{{ old('description') }}</textarea>
    @error('description')<span class="error">{{ $message }}</span>@enderror

    <label>Award Picture</label>
    <input name="image" type="file" accept="image/*">
    @error('image')<span class="error">{{ $message }}</span>@enderror

    <label>Sort Order</label>
    <input name="sort_order" type="number" value="{{ old('sort_order', 0) }}">
    @error('sort_order')<span class="error">{{ $message }}</span>@enderror

    <div style="margin-top: 1.5rem; gap: 1rem; display: flex;">
        <button type="submit" class="btn-primary">Save Award</button>
        <a href="{{ route('admin.awards.index') }}" class="btn-secondary" style="padding: 0.8rem 1.2rem; border-radius: 10px; background: #ccc; color: #000;">Cancel</a>
    </div>
</form>
@endsection
