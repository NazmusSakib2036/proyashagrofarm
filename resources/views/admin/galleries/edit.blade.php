@extends('layouts.admin')

@section('title', 'Edit Gallery Image')

@section('content')
<h1>Edit Gallery Image</h1>
<form method="POST" action="{{ route('admin.galleries.update', $gallery) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.galleries.form')
    <button type="submit">Update</button>
</form>
@endsection
