@extends('layouts.admin')

@section('title', 'Add Media Partner')

@section('content')
<h1>Add Media Logo</h1>
<form method="POST" action="{{ route('admin.media-partners.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.media-partners.form')
    <button type="submit">Create</button>
</form>
@endsection
