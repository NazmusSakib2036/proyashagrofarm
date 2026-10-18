@extends('layouts.admin')

@section('title','Edit Concern')

@section('content')
<h1>Edit Concern</h1>
<form method="POST" action="{{ route('admin.concerns.update',$concern) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    <label>Name</label>
    <input name="name" value="{{ old('name',$concern->name) }}" required>
    <label>Description</label>
    <textarea name="description" rows="6" class="js-richtext">{{ old('description',$concern->description) }}</textarea>
    <label>Website</label>
    <input name="website" type="url" value="{{ old('website',$concern->website) }}">
    <label>Images</label>
    <input name="images[]" type="file" multiple accept="image/*">
    <p>Existing images:</p>
    @if($concern->images)
        @foreach($concern->images as $img)
            <img src="{{ asset('storage/'.$img) }}" alt="" style="height:56px;margin-right:6px;">
        @endforeach
    @endif
    <label>Sort Order</label>
    <input name="sort_order" type="number" value="{{ old('sort_order',$concern->sort_order) }}">
    <button type="submit" class="btn-primary">Save</button>
</form>
@endsection
