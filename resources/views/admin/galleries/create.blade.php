@extends('layouts.admin')

@section('title', 'Add Gallery Image')

@section('content')
<h1>Add Gallery Image</h1>
<form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.galleries.form')
    <button type="submit">Create</button>
</form>
@endsection
