@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<h1>Edit Service</h1>
<form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.services.form')
    <button type="submit">Update</button>
</form>
@endsection
