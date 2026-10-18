@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<h1>Edit Testimonial</h1>
<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.testimonials.form')
    <button type="submit">Update</button>
</form>
@endsection
