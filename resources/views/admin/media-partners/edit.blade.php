@extends('layouts.admin')

@section('title', 'Edit Media Partner')

@section('content')
<h1>Edit Media Logo</h1>
<form method="POST" action="{{ route('admin.media-partners.update', $mediaPartner) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.media-partners.form')
    <button type="submit">Update</button>
</form>
@endsection
