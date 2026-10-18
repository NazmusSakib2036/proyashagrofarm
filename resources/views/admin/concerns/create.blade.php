@extends('layouts.admin')

@section('title','Add Concern')

@section('content')
<h1>Add Concern</h1>
<form method="POST" action="{{ route('admin.concerns.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    <label>Name</label>
    <input name="name" required>
    <label>Description</label>
    <textarea name="description" rows="6" class="js-richtext"></textarea>
    <label>Website</label>
    <input name="website" type="url">
    <label>Images</label>
    <input name="images[]" type="file" multiple accept="image/*">
    <label>Sort Order</label>
    <input name="sort_order" type="number" value="0">
    <button type="submit" class="btn-primary">Save</button>
</form>
@endsection
